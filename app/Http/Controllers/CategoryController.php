<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string|max:1000',
            'color' => 'required|string|max:7',
            'icon' => 'nullable|string|max:255',
        ]);

        Category::create($validated);

        return back()->with('success', 'Catégorie créée avec succès.');
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string|max:1000',
            'color' => 'required|string|max:7',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        $category->update($validated);

        return back()->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Catégorie supprimée avec succès.');
    }
}
