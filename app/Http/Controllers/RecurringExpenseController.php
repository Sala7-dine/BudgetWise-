<?php

namespace App\Http\Controllers;

use App\Models\RecurringExpense;
use Illuminate\Http\Request;

class RecurringExpenseController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'frequency' => 'required|in:monthly,weekly,yearly',
            'day_of_month' => 'required_if:frequency,monthly|nullable|numeric|min:1|max:31'
        ]);

        auth()->user()->recurringExpenses()->create($validated);

        return back()->with('success', 'Dépense récurrente ajoutée avec succès.');
    }

    public function update(Request $request, RecurringExpense $recurringExpense)
    {
        $this->authorize('update', $recurringExpense);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'frequency' => 'required|in:monthly,weekly,yearly',
            'day_of_month' => 'required_if:frequency,monthly|nullable|numeric|min:1|max:31'
        ]);

        $recurringExpense->update($validated);

        return back()->with('success', 'Dépense récurrente mise à jour avec succès.');
    }

    public function destroy(RecurringExpense $recurringExpense)
    {
        $this->authorize('delete', $recurringExpense);
        
        $recurringExpense->delete();

        return back()->with('success', 'Dépense récurrente supprimée avec succès.');
    }
}
