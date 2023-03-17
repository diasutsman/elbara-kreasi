<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminProductController extends Controller
{

    private $fieldsView;
    private $categories;
    private function categories()
    {
        return $this->categories ?? ($this->categories = Category::all());
    }

    public function __construct()
    {
        $this->fieldsView = [
            'name_html' => function (Product $product) {
                return view('admin.components.form',  [
                    'route' => route('admin.products.update', ''),
                    'method' => 'PUT',
                    'obj' => $product,
                ])->render()
                    .
                    view('admin.components.input', [
                        'obj' => $product,
                        'field' => 'name',
                    ])->render();
            },
            'is_best_seller_html' => function (Product $product) {
                return view('admin.components.checkbox', [
                    'obj' => $product,
                    'field' => 'is_best_seller',
                ])->render();
            },
            'image_html' => function (Product $product) {
                return view('admin.components.image', [
                    'obj' => $product,
                    'field' => 'image',
                ])->render();
            },
            'description_html' => function (Product $product) {
                return view('admin.components.editor', [
                    'obj' => $product,
                    'field' => 'description',
                ])->render();
            },
            'additional_information_html' => function (Product $product) {
                return view('admin.components.editor', [
                    'obj' => $product,
                    'field' => 'additional_information',
                ])->render();
            },
            'price_html' => function (Product $product) {
                return view('admin.components.input', [
                    'obj' => $product,
                    'field' => 'price',
                    'type' => 'number',
                ])->render();
            },
            'category_id_html' => function (Product $product) {
                return view('admin.components.select', [
                    'obj' => $product,
                    'field' => 'category_id',
                    'options' => $this->categories(),
                ])->render();
            },
            'action_html' => function (Product $product) {
                return view('admin.components.action', [
                    'obj' => $product,
                    'field' => 'slug',
                    'route' => 'admin.products.destroy',
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
            $data = Product::all();
            $dataTables = DataTables::of($data)->addIndexColumn();
            foreach ($this->fieldsView as $key => $value) {
                $dataTables->addColumn($key, $value);
            }
            return $dataTables->rawColumns(array_keys($this->fieldsView))->make(true);
        }
        return view('admin.products.index', [
            'categories' => $this->categories(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['slug'] = SlugService::createSlug(Product::class, 'slug', $validatedData['name']);
        $validatedData['is_best_seller'] = $request->has('is_best_seller');

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        Product::create($validatedData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();

        if ($product->name !== $validatedData['name'])
            $validatedData['slug'] = SlugService::createSlug(Product::class, 'slug', $validatedData['name']);

        if ($request->file('image')) {
            if (isset($product) && $product->image) {
                Storage::delete($product->image);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        $validatedData['is_best_seller'] = $request->has('is_best_seller');

        $product->update($validatedData);

        return $this->show($product);
    }

    // public function updatedRow(Product $product)
    // {
    //     return collect($this->fieldsView)->map(function ($field) use ($product) {
    //         return view('admin.components.td', [
    //             'data' => $field($product),
    //         ])->render();
    //     })->join('');
    // }

    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();
    }
}
