<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'stock' => 'required|min:0',
            'price' => 'required|min:0',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price
        ]);

        return redirect('products');
    }

    public function edit($id) {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'stock' => 'required|min:0',
            'price' => 'required|min:0',
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price
        ]);

        return redirect('products');
    }

    public function delete($id) {
        $product = Product::destroy($id);

        return redirect()->back();
    }
}
