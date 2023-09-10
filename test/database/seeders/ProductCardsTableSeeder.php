<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCard;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCardsTableSeeder extends Seeder
{
    public function run()
    {
        // Создание 50 уникальных карточек товаров
        $productCards = [];

        for ($i = 1; $i <= 50; $i++) {
            $productCards[] = [
                'name' => 'Товар ' . $i,
                'article_number' => random_int(100000, 999999),
                'retail_price' => rand(0.99, 99.99),
            ];
        }

        ProductCard::insert($productCards);
    }
}
