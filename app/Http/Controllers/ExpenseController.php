<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();
        $now = Carbon::now();
        $startOfMonth = $now->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();

        // Calculer le budget restant
        $monthlyExpenses = $user->expenses()
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->sum('amount');
        $remainingBudget = $user->salary - $monthlyExpenses;

        // Vérifier si la dépense dépasse le budget restant
        if ($request->amount > $remainingBudget) {
            return redirect()->back()
                ->with('error', 'Attention ! Cette dépense dépasse votre budget restant de ' . number_format($remainingBudget, 2) . ' DH')
                ->with('warning', true);
        }

        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $validated['date'] = Carbon::now();
        
        auth()->user()->expenses()->create($validated);

        return back()->with('success', 'Dépense ajoutée avec succès.');
    }

    public function update(Request $request, Expense $expense)
    {
        //$this->authorize('update', $expense);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
        ]);

        $expense->update($validated);

        return back()->with('success', 'Dépense mise à jour avec succès.');
    }

    public function destroy(Expense $expense)
    {
        //$this->authorize('delete', $expense);
        $expense->delete();
        return back()->with('success', 'Dépense supprimée avec succès.');
    }
}
