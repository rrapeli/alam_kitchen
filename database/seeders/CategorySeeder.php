<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuCategory::create(
            [
                'name' => 'Appetizers',
                'slug' => 'appetizers',
                'description' => 'Start your meal with our delicious appetizers.',
            ]
        );
    }
}
