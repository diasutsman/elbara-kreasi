<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
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

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::all();
            $dataTable = DataTables::of($data)->addIndexColumn();

            foreach ($this->fieldsView as $field => $view) {
                $dataTable->addColumn($field, $view);
            }

            return $dataTable->rawColumns(array_keys($this->fieldsView))->make(true);
        }
        return view('admin.categories.index');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['slug'] = SlugService::createSlug(Category::class, 'slug', $validatedData['name']);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('category-images');
        }

        Category::create($validatedData);
    }

    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::delete($category->image);
        }
        $category->delete();
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $validatedData = $request->validated();

        if ($category->name !== $validatedData['name'])
            $validatedData['slug'] = SlugService::createSlug(Category::class, 'slug', $validatedData['name']);

        if ($request->file('image')) {
            if ($category->image) {
                Storage::delete($category->image);
            }
            $validatedData['image'] = $request->file('image')->store('category-images');
        }

        $category->update($validatedData);

        return $this->updatedRow($category);
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
