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
use App\Services\GeminiService;

class DashboardController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }
    public function index(){

        $user = auth()->user();
        $now = Carbon::now();
        $startOfMonth = $now->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();

        // Salaire et calculs de budget
        $salary = $user->salary ?? 0;
        $monthlyExpenses = $user->expenses()
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('amount');
        
        $remainingBudget = $salary - $monthlyExpenses;
        $budgetPercentage = $salary > 0 ? ($monthlyExpenses / $salary) * 100 : 0;

        
        // Calcul de la prochaine date de salaire
        $nextSalaryDate = null;
        $daysUntilSalary = null;
        if ($user->salary_day) {
            $nextSalaryDate = Carbon::create(null, null, $user->salary_day);
            if ($nextSalaryDate->isPast()) {
                $nextSalaryDate->addMonth();
            }
            $daysUntilSalary = $now->diffInDays($nextSalaryDate, false);
        }

        // Récupération des dépenses par catégorie
        $expensesByCategory = $user->expenses()
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->select('category_id', DB::raw('SUM(amount) as total'))
            ->groupBy('category_id')
            ->with('category')
            ->get();

        // Récupération des données nécessaires
        $goals = $user->goals()->orderBy('deadline')->get();

        // Modification temporaire en attendant la migration
        $categories = Category::all();


        $wishes = $user->wishes()->orderBy('priority')->get();

        $recurringExpenses = $user->recurringExpenses()->with('category')->get();
        $expenses = $user->expenses()
            ->with('category')
            ->orderBy('date', 'desc')
            ->paginate(10);
            $suggestions = nl2br($this->geminiService->getSuggestions($expenses, $recurringExpenses, $salary));
        return view('dashboard.user', compact(
            'salary',
            'monthlyExpenses',
            'remainingBudget',
            'budgetPercentage',
            'nextSalaryDate',
            'daysUntilSalary',
            'expensesByCategory',
            'goals',
            'categories',
            'recurringExpenses',
            'expenses',
            'wishes',
            'suggestions'
            
        ));
    }
}