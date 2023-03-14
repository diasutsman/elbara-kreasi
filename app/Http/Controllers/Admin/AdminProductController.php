<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminProductController extends Controller
{

    private $fieldsView;

    public function __construct()
    {
        $this->fieldsView = [
            'name' => function (Product $product) {
                return view('admin.components.form',  [
                    'route' => route('admin.products.update', $product->slug),
                    'method' => 'PUT',
                    'obj' => $product,
                ])->render()
                    .
                    view('admin.components.input', [
                        'obj' => $product,
                        'field' => 'name',
                    ])->render();
            },
            'is_best_seller' => function (Product $product) {
                return view('admin.components.checkbox', [
                    'obj' => $product,
                    'checked' => $product->is_best_seller == '1' ? true : false,
                    'formId' => 'form-' . $product->slug,
                ])->render();
            },
            'image' => function (Product $product) {
                return view('admin.components.image', [
                    'obj' => $product,
                    'field' => 'image',
                ])->render();
            },
            'description' => function (Product $product) {
                return view('admin.components.editor', [
                    'obj' => $product,
                    'field' => 'description',
                ])->render();
            },
            'additional_information' => function (Product $product) {
                return view('admin.components.editor', [
                    'obj' => $product,
                    'field' => 'additional_information',
                ])->render();
            },
            'price' => function (Product $product) {
                return view('admin.components.input', [
                    'obj' => $product,
                    'field' => 'price',
                    'type' => 'number',
                ])->render();
            },
            'category_id' => function (Product $product) {
                return view('admin.components.select', [
                    'obj' => $product,
                    'field' => 'category_id',
                    'options' => Category::all(),
                ])->render();
            },
            'action' => function (Product $product) {
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
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('name', $this->fieldsView['name'])
                ->addColumn('image', $this->fieldsView['image'])
                ->addColumn('is_best_seller', $this->fieldsView['is_best_seller'])
                ->addColumn('description', $this->fieldsView['description'])
                ->addColumn('additional_information', $this->fieldsView['additional_information'])
                ->addColumn('price', $this->fieldsView['price'])
                ->addColumn('category_id', $this->fieldsView['category_id'])
                ->addColumn('action', $this->fieldsView['action'])
                ->rawColumns(['action', 'name', 'is_best_seller', 'image', 'description', 'category_id', 'additional_information', 'price'])
                ->make(true);
        }
        return view('admin.products.index', [
            'categories' => Category::all(),
        ]);
    }

    public function validatedData(Request $request, Product $product = null)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'description' => 'required',
            'additional_information' => 'required',
            'price' => 'required|min_digits:1|max_digits:100',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) throw new Exception($validator->errors()->first());

        $validatedData = $validator->validated();

        if (isset($product) && $product->name !== $validatedData['name'])
            $validatedData['slug'] = SlugService::createSlug(Product::class, 'slug', $validatedData['name']);

        if ($request->file('image')) {
            if (isset($product) && $product->image) {
                Storage::delete($product->image);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        $validatedData['is_best_seller'] = $request->has('is_best_seller');

        return $validatedData;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $this->validatedData($request);

            Product::create($validatedData);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $validatedData = $this->validatedData($request, $product);

            $product = Product::where('id', $product->id);
            $product->update($validatedData);

            $updatedProduct = $product->first();

            return $this->updatedRow($updatedProduct);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function updatedRow(Product $product)
    {
        return collect($this->fieldsView)->map(function ($field) use ($product) {
            return view('admin.components.td', [
                'data' => $field($product),
            ])->render();
        })->join('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
