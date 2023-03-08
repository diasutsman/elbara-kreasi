<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

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
                ])->render();
            }
        ];   
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
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:categories,name',
            'image' => 'image|file|max:1024',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Category::class, 'slug', $validatedData['name']);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('category-images');
        }

        Category::create($validatedData);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return $category;
    }

    public function update(Request $request, Category $category)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:categories,name,' . $category->id . ',id',
            'image' => 'image|file|max:1024',
        ]);

        if ($validator->fails())
            return response()->json(['error' => $validator->errors()->first()], 422);

        $validatedData = $request->validated();

        $validatedData['slug'] = SlugService::createSlug(Category::class, 'slug', $validatedData['name']);

        if ($request->file('image')) {
            if ($category->image) {
                Storage::delete($category->image);
            }
            $validatedData['image'] = $request->file('image')->store('category-images');
        }

        $category = Category::where('id', $category->id);
        $category->update($validatedData);

        $updatedCategory = $category->first();

        return $this->updatedRow($updatedCategory);
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
