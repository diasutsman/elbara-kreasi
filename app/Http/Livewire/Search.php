<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Search extends Component
{
    public $page = 1;
    public $query = '';

    protected $queryString = ['query' => ['except' => '']];
    protected $listeners = ['searchProducts' => 'search'];

    public function render()
    {
        return view('livewire.search', [
            'products' => Product::latest()->filter(['query' => $this->query])->paginate($this->page * 8),
        ]);
    }

    public function search($query = null)
    {
        $this->query = $query;
        $this->page = 1;
    }

    public function loadMore()
    {
        $this->page++;
    }
}
