<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                "name" => "Nasi Ayam Hainan",
                "description" => "Nasi ayam hainan dengan saus spesial",
                "price" => 25000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1564597424546-385242870f0d",
            ],
            [
                "name" => "Nasi Goreng Spesial",
                "description" => "Nasi goreng dengan telur dan ayam",
                "price" => 22000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1604908176997-431c7c3cbe3f",
            ],
            [
                "name" => "Mie Goreng Jawa",
                "description" => "Mie goreng khas jawa",
                "price" => 20000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1612929633738-8fe44f7ec841",
            ],
            [
                "name" => "Ayam Geprek",
                "description" => "Ayam crispy sambal pedas",
                "price" => 23000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1604908177522-4324a8c62a14",
            ],
            [
                "name" => "Sate Ayam",
                "description" => "Sate ayam bumbu kacang",
                "price" => 27000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1604908177501-3c8c5d2a769c",
            ],
            [
                "name" => "Americano",
                "description" => "Americano 2 shot",
                "price" => 25000,
                "category" => "minuman",
                "image" => "https://images.unsplash.com/photo-1509042239860-f550ce710b93",
            ],
            [
                "name" => "Cappuccino",
                "description" => "Kopi susu foam lembut",
                "price" => 28000,
                "category" => "minuman",
                "image" => "https://images.unsplash.com/photo-1498804103079-a6351b050096",
            ],
            [
                "name" => "Es Teh Manis",
                "description" => "Teh manis dingin",
                "price" => 8000,
                "category" => "minuman",
                "image" => "https://images.unsplash.com/photo-1558642452-9d2a7deb7f62",
            ],
            [
                "name" => "Jus Alpukat",
                "description" => "Jus alpukat coklat",
                "price" => 18000,
                "category" => "minuman",
                "image" => "https://images.unsplash.com/photo-1572490122747-3968b75cc699",
            ],
            [
                "name" => "Lemon Tea",
                "description" => "Teh lemon segar",
                "price" => 15000,
                "category" => "minuman",
                "image" => "https://images.unsplash.com/photo-1523362628745-0c100150b504",
            ],
            [
                "name" => "Nasi Rendang",
                "description" => "Nasi dengan rendang sapi khas Padang",
                "price" => 30000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1604908177234-6b5f9f6e6d7a",
            ],
            [
                "name" => "Ayam Bakar Madu",
                "description" => "Ayam bakar dengan saus madu manis gurih",
                "price" => 28000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1604908177555-4c3a3f0c5f98",
            ],
            [
                "name" => "Nasi Ayam Teriyaki",
                "description" => "Ayam teriyaki dengan nasi hangat",
                "price" => 26000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1604908177003-cc0d8b6f6d63",
            ],
            [
                "name" => "Spaghetti Bolognese",
                "description" => "Pasta dengan saus daging khas Italia",
                "price" => 32000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1608759265882-0c0c8f5d9e0b",
            ],
            [
                "name" => "Chicken Katsu",
                "description" => "Ayam goreng tepung dengan saus katsu",
                "price" => 27000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1604908177333-98b3f4b2e3a7",
            ],

            // 🍟 SNACK
            [
                "name" => "Kentang Goreng",
                "description" => "Kentang goreng crispy",
                "price" => 15000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1576107232684-1279f390859f",
            ],
            [
                "name" => "Onion Rings",
                "description" => "Cincin bawang goreng renyah",
                "price" => 17000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1625944525903-c6b0c9e1b8b2",
            ],

            // 🍰 DESSERT
            [
                "name" => "Cheesecake",
                "description" => "Kue keju lembut dengan topping",
                "price" => 25000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1505253216365-7f8c0d2c0f0b",
            ],
            [
                "name" => "Brownies Coklat",
                "description" => "Brownies coklat moist",
                "price" => 20000,
                "category" => "makanan",
                "image" => "https://images.unsplash.com/photo-1606313564200-e75d5e30476c",
            ],

            // ☕ MINUMAN
            [
                "name" => "Latte",
                "description" => "Espresso dengan susu creamy",
                "price" => 28000,
                "category" => "minuman",
                "image" => "https://images.unsplash.com/photo-1509042239860-f550ce710b93",
            ],
            [
                "name" => "Matcha Latte",
                "description" => "Minuman matcha dengan susu",
                "price" => 30000,
                "category" => "minuman",
                "image" => "https://images.unsplash.com/photo-1582719478250-c89cae4dc85b",
            ],
            [
                "name" => "Chocolate Milkshake",
                "description" => "Milkshake coklat dingin",
                "price" => 26000,
                "category" => "minuman",
                "image" => "https://images.unsplash.com/photo-1572490122747-3968b75cc699",
            ],
            [
                "name" => "Es Kopi Susu Gula Aren",
                "description" => "Kopi susu dengan gula aren khas",
                "price" => 24000,
                "category" => "minuman",
                "image" => "https://images.unsplash.com/photo-1511920170033-f8396924c348",
            ],
            [
                "name" => "Air Mineral",
                "description" => "Air mineral dingin",
                "price" => 5000,
                "category" => "minuman",
                "image" => "https://images.unsplash.com/photo-1564419320408-38e24e038c6c",
            ],
        ];

        foreach ($menus as $menu) {
            $category = MenuCategory::where('slug', $menu['category'])->first();

            if (!$category) {
                echo "Category tidak ditemukan: " . $menu['category'] . "\n";
                continue;
            }

            Menu::create([
                'name' => $menu['name'],
                'slug' => Str::slug($menu['name']), // ✅ FIX
                'description' => $menu['description'],
                'price' => $menu['price'],
                'category_id' => $category->id,
                'image' => $menu['image'],
            ]);
        }
    }
}
