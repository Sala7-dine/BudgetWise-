<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'estimated_cost' => 'required|numeric|min:0',
            'priority' => 'required|in:low,medium,high',
        ]);

        $wish = auth()->user()->wishes()->create([
            ...$validated,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Souhait ajouté avec succès.');
    }

    public function update(Request $request, Wish $wish)
    {
        $this->authorize('update', $wish);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'estimated_cost' => 'required|numeric|min:0',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,achieved,cancelled',
        ]);

        $wish->update($validated);

        return back()->with('success', 'Souhait mis à jour avec succès.');
    }

    public function destroy(Wish $wish)
    {
        $this->authorize('delete', $wish);
        
        $wish->delete();
        return back()->with('success', 'Souhait supprimé avec succès.');
    }
}
