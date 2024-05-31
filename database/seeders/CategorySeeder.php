<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Startup',
                'icons' => null
            ],

            [
                'name' => 'Movies',
                'icons' => null
            ],

            [
                'name' => 'Bussiness',
                'icons' => null
            ],

            [
                'name' => 'Learn',
                'icons' => null
            ],

            [
                'name' => 'Game',
                'icons' => null
            ],

            [
                'name' => 'Sport',
                'icons' => null
            ]
        ];

        // Insert Data
        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'icons' => $category['icons']
            ]);
        }
    }
}
