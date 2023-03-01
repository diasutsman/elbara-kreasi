<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function productsByCategory(Category $category)
    {
        return view('category.products', [
            'category' => $category,
        ]);
    }

}
