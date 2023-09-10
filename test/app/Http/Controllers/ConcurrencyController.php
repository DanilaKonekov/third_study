<?php

namespace App\Http\Controllers;

use App\Models\Concurrency;
use Illuminate\Http\Request;

class ConcurrencyController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_card_id' => 'required|exists:product_cards,id',
            'source_item_id' => 'required|exists:source_items,id',
            'competitor_name' => 'required',
            'price_difference' => 'required|numeric',
        ]);

        Concurrency::create($validatedData);

        return redirect()->route('concurrency.index')->with('success', 'Concurrency created successfully.');
    }

    public function update(Request $request, Concurrency $concurrency)
    {
        $validatedData = $request->validate([
            'product_card_id' => 'required|exists:product_cards,id',
            'source_item_id' => 'required|exists:source_items,id',
            'competitor_name' => 'required',
            'price_difference' => 'required|numeric',
        ]);

        $concurrency->update($validatedData);

        return redirect()->route('concurrency.index')->with('success', 'Concurrency updated successfully.');
    }
}
