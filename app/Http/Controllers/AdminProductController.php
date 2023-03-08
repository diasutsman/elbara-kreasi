<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

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
            'description' => function (Product $product)
            {
                return view('admin.components.editor', [
                    'obj' => $product,
                    'field' => 'description',
                ])->render();
            },
            'action' => function (Product $product) {
                return view('admin.components.action', [
                    'obj' => $product,
                    'field' => 'slug',
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
                ->addColumn('action', $this->fieldsView['action'])
                ->rawColumns(['action', 'name', 'is_best_seller', 'image', 'description'])
                ->make(true);
        }
        return view('admin.products.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024',
        ]);

        if ($validator->fails())
            return response()->json(['error' => $validator->errors()->first()], 422);


        $validatedData = $validator->validated();

        if ($product->name !== $validatedData['name'])
            $validatedData['slug'] = SlugService::createSlug(Product::class, 'slug', $validatedData['name']);

        if ($request->file('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        $validatedData['is_best_seller'] = $request->has('is_best_seller');

        $product = Product::where('id', $product->id);
        $product->update($validatedData);

        $updatedProduct = $product->first();

        return $this->updatedRow($updatedProduct);
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
        //
    }
}
