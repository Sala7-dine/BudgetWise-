<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'target_amount' => 'required|numeric|min:0',
            'deadline' => 'required|date|after:today',
        ]);

        $goal = auth()->user()->goals()->create([
            ...$validated,
            'current_amount' => 0,
            'status' => 'in_progress'
        ]);

        return back()->with('success', 'Objectif créé avec succès.');
    }

    public function update(Request $request, Goal $goal)
    {
        //$this->authorize('update', $goal);

        $validated = $request->validate([
            'current_amount' => 'required|numeric|min:0',
        ]);

        $goal->update($validated);

        if ($goal->current_amount >= $goal->target_amount) {
            $goal->update(['status' => 'completed']);
        }

        return back()->with('success', 'Progression mise à jour avec succès.');
    }

    public function destroy(Goal $goal)
    {
        //$this->authorize('delete', $goal);
        
        $goal->delete();
        return back()->with('success', 'Objectif supprimé avec succès.');
    }
}
