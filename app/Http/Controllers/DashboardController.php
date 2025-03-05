<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Wish;
use App\Models\Expense;
use App\Models\Category;
use App\Models\RecurringExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $now = Carbon::now();
        $startOfMonth = $now->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();

        // Salaire et calculs
        $salary = $user->salary ?? 0;
        $monthlyExpenses = $user->expenses()
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('amount') ?? 0;
        
        // Calcul du revenu restant
        $remainingBudget = $salary - $monthlyExpenses;
        $budgetPercentage = $salary > 0 ? ($monthlyExpenses / $salary) * 100 : 0;

        // Date du prochain salaire
        $nextSalaryDate = null;
        $daysUntilSalary = null;
        if ($user->salary_day) {
            $nextSalaryDate = Carbon::create(null, null, $user->salary_day);
            if ($nextSalaryDate->isPast()) {
                $nextSalaryDate->addMonth();
            }
            $daysUntilSalary = $now->diffInDays($nextSalaryDate, false);
        }

        // Récupérer les catégories pour le formulaire
        $categories = Category::all();

        // Récupérer les dépenses récurrentes
        $recurringExpenses = $user->recurringExpenses()
            ->with('category')
            ->orderBy('amount', 'desc')
            ->get();

        // Récupérer les dépenses pour le tableau
        $expenses = $user->expenses()
            ->with('category')
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('dashboard.user', compact(
            'salary',
            'monthlyExpenses',
            'remainingBudget',
            'budgetPercentage',
            'nextSalaryDate',
            'daysUntilSalary',
            'categories',
            'recurringExpenses',
            'expenses'
        ));
    }

    private function generateAISuggestions($user)
    {
        // ...existing code...
    }
}