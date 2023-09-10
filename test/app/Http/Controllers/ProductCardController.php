<?php

namespace App\Http\Controllers;

use App\Models\ProductCard;
use Illuminate\Http\Request;

class ProductCardController extends Controller
{
    public function index()
    {
        $productCards = ProductCard::all();
        return view('product-cards.index', compact('productCards'));
    }

    public function create()
    {
        return view('product-cards.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'article_number' => 'required|unique:product_cards',
            'retail_price' => 'required|numeric',
        ]);

        ProductCard::create($validatedData);

        return redirect()->route('product-cards.index')->with('success', 'Product card created successfully.');
    }

    public function edit(ProductCard $productCard)
    {
        return view('product-cards.edit', compact('productCard'));
    }

    public function update(Request $request, ProductCard $productCard)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'article_number' => 'required|unique:product_cards,article_number,'.$productCard->id,
            'retail_price' => 'required|numeric',
        ]);

        $productCard->update($validatedData);

        return redirect()->route('product-cards.index')->with('success', 'Product card updated successfully.');
    }

    public function destroy(ProductCard $productCard)
    {
        $productCard->delete();

        return redirect()->route('product-cards.index')->with('success', 'Product card deleted successfully.');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);

        // Получаем значение запроса из GET-параметра 'query' или используем пустую строку
        $query = request()->input('query', '');

        // Применяем оператор LIKE для поиска товаров
        $conccurencies = $product->conccurencies()
            ->where('name', 'LIKE', "%{$query}%")
            ->get();
        return view('products.show', compact('product', 'conccurencies'));
    }
}
