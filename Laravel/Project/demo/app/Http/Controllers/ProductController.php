<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create', ['categories' => Category::orderBy('name')->get()]);
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->validated());

        return to_route('dashboard')->with('success', 'Product added successfully.');
    }
}
