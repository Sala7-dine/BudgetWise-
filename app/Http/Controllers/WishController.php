<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends Controller{
    
    public function store(Request $request){

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'estimated_cost' => 'required|numeric|min:0',
            'saved_amount' => 'required|numeric|min:0',
            'priority' => 'required|in:low,medium,high',
            'auto_save_percentage' => 'required|numeric|min:0|max:100',
        ]);
        
        //dd($validated);

        $wish = auth()->user()->wishes()->create([
            ...$validated,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Souhait ajouté avec succès.');
    }

    public function update(Request $request, Wish $wish){

        //$this->authorize('update', $wish);

        $validated = $request->validate([
            'status' => 'nullable|in:pending,achieved,cancelled',
            'saved_amount' => 'nullable|numeric|min:0',
        ]);

        $wish->update($validated);

        return back()->with('success', 'Souhait mis à jour avec succès.');
    }

    public function destroy(Wish $wish){
        
        //$this->authorize('delete', $wish);
        
        $wish->delete();
        return back()->with('success', 'Souhait supprimé avec succès.');
    }

    public function processAutoSave()
    {
        $user = auth()->user();
        if (!$user || !$user->salary) {
            return;
        }

        $monthlyExpenses = $user->expenses()
            ->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->sum('amount');

        $remainingBudget = $user->salary - $monthlyExpenses;

        if ($remainingBudget > 0) {
            $user->wishes()
                ->where('status', 'pending')
                ->orderBy('priority', 'desc')
                ->get()
                ->each(function ($wish) use (&$remainingBudget) {
                    if ($wish->processAutoSave($remainingBudget)) {
                        $remainingBudget -= ($remainingBudget * $wish->auto_save_percentage / 100);
                    }
                });
        }
    }
}
