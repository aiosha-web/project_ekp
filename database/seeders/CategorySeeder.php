<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
        ['name' => 'ABCs'],
        ['name' => 'Colors'],
        ['name' => 'Numbers'],
        ['name' => 'Animals'],
        ['name' => 'Body Parts'],
        ['name' => 'Fruits'],
        ['name' => 'Days of the Week'],
    ]);
    }
}


