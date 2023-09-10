<?php

namespace App\Http\Controllers;

use App\Models\SourceItem;
use Illuminate\Http\Request;

class SourceItemController extends Controller
{
    public function index()
    {
        $sourceItems = SourceItem::all();
        return view('source-items.index', compact('sourceItems'));
    }

    public function create()
    {
        return view('source-items.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'opt_price' => 'required|numeric',
            'retail_price' => 'nullable|numeric',
        ]);

        SourceItem::create($validatedData);

        return redirect()->route('source-items.index')->with('success', 'Source item created successfully.');
    }

    public function edit(SourceItem $sourceItem)
    {
        return view('source-items.edit', compact('sourceItem'));
    }

    public function update(Request $request, SourceItem $sourceItem)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'opt_price' => 'required|numeric',
            'retail_price' => 'nullable|numeric',
        ]);

        $sourceItem->update($validatedData);

        return redirect()->route('source-items.index')->with('success', 'Source item updated successfully.');
    }

    public function destroy(SourceItem $sourceItem)
    {
        $sourceItem->delete();

        return redirect()->route('source-items.index')->with('success', 'Source item deleted successfully.');
    }
}
