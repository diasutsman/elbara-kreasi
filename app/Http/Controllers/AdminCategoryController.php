<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Yajra\DataTables\DataTables;

class AdminCategoryController extends Controller
{
  public function index(Request $request)
  {
    if ($request->ajax()) {
      $data = Category::all();
      return DataTables::of($data)->addIndexColumn()
        ->addColumn('name', function ($category) {
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
        })
        ->addColumn('image', function ($category) {
          return view('admin.components.image', [
            'obj' => $category,
            'field' => 'image',
          ])->render();
        })
        ->addColumn('action', function ($category) {
          return view('admin.components.action', [
            'obj' => $category,
            'field' => 'slug',
          ])->render();
        })
        ->rawColumns(['action', 'name', 'image'])
        ->make(true);
    }
    return view('admin.categories.index', [
      'categories' => Category::all()
    ]);
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
    $validatedData = $request->validate([
      'name' => 'required|max:255|unique:categories,name,' . $category->id . ',id',
      'image' => 'image|file|max:1024',
    ]);

    $validatedData['slug'] = SlugService::createSlug(Category::class, 'slug', $validatedData['name']);

    if ($request->file('image')) {
      if ($request->oldImage) {
        Storage::delete($request->oldImage);
      }
      $validatedData['image'] = $request->file('image')->store('category-images');
    }

    Category::where('id', $category->id)
      ->update($validatedData);
  }
}
