<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Nourriture', 'color' => '#3b82f6', 'icon' => 'food'],
            ['name' => 'Transport', 'color' => '#ef4444', 'icon' => 'transport'],
            ['name' => 'Logement', 'color' => '#10b981', 'icon' => 'home'],
            ['name' => 'Loisirs', 'color' => '#8b5cf6', 'icon' => 'entertainment'],
            ['name' => 'Shopping', 'color' => '#f59e0b', 'icon' => 'shopping'],
            ['name' => 'Santé', 'color' => '#ec4899', 'icon' => 'health'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
