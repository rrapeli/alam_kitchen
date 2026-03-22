<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Makanan', 'slug' => 'makanan'],
            ['name' => 'Minuman', 'slug' => 'minuman'],
        ];

        foreach ($categories as $category) {
            MenuCategory::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
