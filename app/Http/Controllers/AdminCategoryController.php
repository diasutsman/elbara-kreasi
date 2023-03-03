<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
  public function index()
  {
    return view('admin.categories.index', [
      'categories' => Category::all()
    ]);
  }

  public function show()
  {
    # code...
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

    dd($validatedData);

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
