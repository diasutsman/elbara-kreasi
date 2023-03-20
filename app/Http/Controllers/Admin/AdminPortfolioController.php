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
            'title_html' => function ($portfolio) {
                return
                    view('admin.components.form',  [
                        'route' => route('admin.portfolios.update', ''),
                        'method' => 'PUT',
                        'obj' => $portfolio,
                    ])->render()
                    .
                    view('admin.components.input', [
                        'obj' => $portfolio,
                        'field' => 'title',
                    ])->render();
            },
            'image_html' => function ($portfolio) {
                return view('admin.components.image', [
                    'obj' => $portfolio,
                    'field' => 'image',
                ])->render();
            },
            'product_id_html' => function ($portfolio) {
                return view('admin.components.datalist', [
                    'obj' => $portfolio,
                    'field' => 'product_id',
                    'optionField' => 'name',
                    'options' => $this->products,
                ])->render();
            },
            'action_html' => function ($portfolio) {
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
            $dataTables = DataTables::of($data)->addIndexColumn();

            foreach ($this->fieldsView as $field => $view) {
                $dataTables->addColumn($field, $view);
            }

            return $dataTables->rawColumns(array_keys(array_merge($this->fieldsView, $data->toArray()[0])))->make(true);
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
            if ($portfolio->image) Storage::delete($portfolio->image);
            $validatedData['image'] = $request->file('image')->store('portfolio-images');
        }

        $portfolio->update($validatedData);

        return $this->show($portfolio);
    }

    public function show(Portfolio $portfolio)
    {
        return $portfolio;
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
