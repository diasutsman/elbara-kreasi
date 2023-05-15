<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', [
            'categories' => Category::all(),
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
            'related_products' => Product::where('category_id', $product->category_id)
                ->without('category')
                ->inRandomOrder()
                ->where('id', '!=', $product->id)
                ->take(rand(4, 5))
                ->get(),
        ]);
    }
}
