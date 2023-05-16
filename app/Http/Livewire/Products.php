<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $page = 1;

    public function render()
    {
        $products = Product::paginate($this->page * 8);
        $this->emit('loadedMore', $products);
        return view('livewire.products', [
            'products' => $products,
            'categories' => Category::whereIn('id', $products->map(fn($product) => $product->category_id))->get(),
        ]);
    }

    public function loadMore()
    {
        $this->page++;
    }
}
