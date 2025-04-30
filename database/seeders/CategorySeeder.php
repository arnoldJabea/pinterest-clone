<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Photographie', 'enabled' => true],
            ['name' => 'Musique', 'enabled' => true],
            ['name' => 'Vidéo', 'enabled' => true],
            ['name' => 'Dessin', 'enabled' => true],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}