<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class AdminPortfolioController extends Controller
{

    private $fieldsView;
    private $products;
    public function __construct()
    {
        $this->products = Product::all();
        $this->fieldsView = [
            'title' => function ($portfolio) {
                return
                    view('admin.components.form',  [
                        'route' => route('admin.portfolios.update', $portfolio->slug),
                        'method' => 'PUT',
                        'obj' => $portfolio,
                    ])->render()
                    .
                    view('admin.components.input', [
                        'obj' => $portfolio,
                        'field' => 'title',
                    ])->render();
            },
            'image' => function ($portfolio) {
                return view('admin.components.image', [
                    'obj' => $portfolio,
                    'field' => 'image',
                ])->render();
            },
            'product_id' => function ($portfolio) {
                return view('admin.components.datalist', [
                    'obj' => $portfolio,
                    'field' => 'product_id',
                    'optionField' => 'name',
                    'options' => $this->products,
                ])->render();
            },
            'action' => function ($portfolio) {
                return view('admin.components.action', [
                    'obj' => $portfolio,
                    'field' => 'slug',
                    'route' => 'admin.portfolios.destroy',
                ])->render();
            }
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Portfolio::all();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('title', $this->fieldsView['title'])
                ->addColumn('image', $this->fieldsView['image'])
                ->addColumn('product_id', $this->fieldsView['product_id'])
                ->addColumn('action', $this->fieldsView['action'])
                ->rawColumns(['action', 'title', 'image', 'product_id'])
                ->make(true);
        }
        return view('admin.portfolios.index', [
            'products' => $this->products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePortfolioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfolioRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['slug'] = SlugService::createSlug(Portfolio::class, 'slug', $validatedData['title']);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('portfolio-images');
        }

        Portfolio::create($validatedData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePortfolioRequest  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $validatedData = $request->validated();

        $validatedData['slug'] = SlugService::createSlug(Portfolio::class, 'slug', $validatedData['title']);

        if ($request->file('image')) {
            Storage::delete($portfolio->image);
            $validatedData['image'] = $request->file('image')->store('portfolio-images');
        }

        $portfolio->update($validatedData);

        return $this->updatedRow($portfolio);
    }

    public function updatedRow(Portfolio $portfolio)
    {
        return collect($this->fieldsView)->map(function ($field) use ($portfolio) {
            return view('admin.components.td', [
                'data' => $field($portfolio),
            ])->render();
        })->join('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        Storage::delete($portfolio->image);
        $portfolio->delete();
    }
}
