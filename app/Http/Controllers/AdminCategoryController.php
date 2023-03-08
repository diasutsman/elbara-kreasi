<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Exception;

class AdminCategoryController extends Controller
{

    private $fieldsView;

    public function __construct()
    {
        $this->fieldsView = [
            'name' => function ($category) {
                return
                    view('admin.components.form',  [
                        'route' => route('admin.categories.update', $category->slug),
                        'method' => 'PUT',
                        'obj' => $category,
                    ])->render()
                    .
                    view('admin.components.input', [
                        'obj' => $category,
                        'field' => 'name',
                    ])->render();
            },
            'image' => function ($category) {
                return view('admin.components.image', [
                    'obj' => $category,
                    'field' => 'image',
                ])->render();
            },
            'action' => function ($category) {
                return view('admin.components.action', [
                    'obj' => $category,
                    'field' => 'slug',
                    'route' => 'admin.categories.destroy',
                ])->render();
            }
        ];
    }

    public function validatedData(Request $request, Category $category = null)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:categories,name' . (isset($category)? ',' . $category->id . ',id' : ''),
            'image' => 'image|file|max:1024',
        ]);

        if ($validator->fails()) throw new Exception($validator->errors()->first());

        $validatedData = $validator->validated();

        $validatedData['slug'] = SlugService::createSlug(Category::class, 'slug', $validatedData['name']);

        if ($request->file('image')) {
            if ($category?->image) {
                Storage::delete($category->image);
            }
            $validatedData['image'] = $request->file('image')->store('category-images');
        }

        return $validatedData;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::all();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('name', $this->fieldsView['name'])
                ->addColumn('image', $this->fieldsView['image'])
                ->addColumn('action', $this->fieldsView['action'])
                ->rawColumns(['action', 'name', 'image'])
                ->make(true);
        }
        return view('admin.categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->validatedData($request);

            $validatedData['slug'] = SlugService::createSlug(Category::class, 'slug', $validatedData['name']);

            if ($request->file('image')) {
                $validatedData['image'] = $request->file('image')->store('category-images');
            }

            Category::create($validatedData);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }

    public function edit(Category $category)
    {
        return $category;
    }

    public function update(Request $request, Category $category)
    {

        try {
            $validatedData = $this->validatedData($request, $category);

            $category = Category::where('id', $category->id);
            $category->update($validatedData);

            $updatedCategory = $category->first();

            return $this->updatedRow($updatedCategory);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function updatedRow(Category $category)
    {
        return collect($this->fieldsView)->map(function ($field) use ($category) {
            return view('admin.components.td', [
                'data' => $field($category),
            ])->render();
        })->join('');
    }
}
