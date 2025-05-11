<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\CardSize;

class CardSizeSeeder extends Seeder
{
    public function run(): void
    {
        CardSize::insert([
            ['name' => 'Petit', 'width' => 1, 'height' => 1],
            ['name' => 'Large', 'width' => 2, 'height' => 1],
            ['name' => 'Grand', 'width' => 2, 'height' => 2],
        ]);
    }
}
