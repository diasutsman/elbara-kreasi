<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Traits\GetImage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{

    private $fieldsView;

    public function __construct()
    {
        $this->fieldsView = [
            'name_html' => function ($category) {
                return
                    view('admin.components.form',  [
                        'route' => route('admin.categories.update', ''),
                        'method' => 'PUT',
                        'obj' => $category,
                    ])->render()
                    .
                    view('admin.components.input', [
                        'obj' => $category,
                        'field' => 'name',
                    ])->render();
            },
            'image_html' => function ($category) {
                return view('admin.components.image', [
                    'obj' => $category,
                    'field' => 'image',
                ])->render();
            },
            'action_html' => function ($category) {
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
            $dataTables = DataTables::of($data)->addIndexColumn();
            foreach ($this->fieldsView as $key => $value) {
                $dataTables->addColumn($key, $value);
            }
            Log::info(($data->toArray()[0]));
            return $dataTables->rawColumns(array_keys(array_merge($this->fieldsView, $data->toArray()[0])))->make(true);
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

        return $this->show($category);
    }

    public function show(Category $category)
    {
        return $category;
    }
}
