<?php

namespace Database\Seeders;

use App\Models\Concurrency;
use Illuminate\Database\Seeder;
use App\Models\ProductCard;
use App\Models\SourceItem;

class ConcurrencySeeder extends Seeder
{
    public function run()
    {
        $productCards = ProductCard::pluck('id')->shuffle();
        $sourceItems = SourceItem::pluck('id')->shuffle();

        $concurrencyData = [];

        for ($i = 0; $i < 50; $i++) {
            $concurrencyData[] = [
                'product_card_id' => $productCards[$i],
                'source_item_id' => $sourceItems[$i],
            ];
        }

        Concurrency::insert($concurrencyData);
    }
}
