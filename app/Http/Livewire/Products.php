<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Products extends Component
{
    public $page = 1;
    public $categorySlug = '';

    protected $queryString = ['categorySlug' => ['as' => 'category', 'except' => '']];

    protected $listeners = ['filter'];

    public function render()
    {
        $products = Product::latest();
        if ($this->categorySlug == '') {
            $products = $products->paginate($this->page * 8);
        } else {
            $products = $products->filter(['category' => $this->categorySlug])->paginate($this->page * 8);
        }
        return view('livewire.products', [
            'products' => $products,
            'categories' => Category::all(),
        ]);
    }

    public function loadMore()
    {
        $this->page++;
    }

    public function filter($categorySlug)
    {
        $this->categorySlug = $categorySlug;
        $this->page = 1;
    }
}
