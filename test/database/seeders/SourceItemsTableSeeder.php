<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SourceItem;
use Illuminate\Database\Eloquent\Factories\Factory;
class SourceItemsTableSeeder extends Seeder
{
    public function run()
    {
        // Создание 50 уникальных карточек товаров
        $sourceitems = [];

        for ($i = 1; $i <= 50; $i++) {
            $sourceitems[] = [
                'name' => 'Элемент ' . $i,
                'opt_price' => rand(0.99, 99.99),
                'retail_price' => rand(0.99, 99.99),
            ];
        }

        SourceItem::insert($sourceitems);
    }
}

