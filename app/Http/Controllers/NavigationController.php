<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

class NavigationController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function order()
    {
        return view('order');
    }

    public function welcome()
    {
        return view('welcome', [
            'products' => Product::where('is_best_seller', 1)->limit(4)->orderBy('updated_at', 'DESC')->get(),
        ]);
    }
}
