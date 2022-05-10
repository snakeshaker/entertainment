<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $image = $request->file('image')->store('categories');
        $space_image = $request->file('space_image')->store('categories');

        Category::create([
            'name' => $request->name,
            'image' => $image,
            'space_image' => $space_image,
            'description' => $request->description
        ]);

        return to_route('admin.categories.index')->with('success', 'Категория создана успешно!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $image = $category->image;
        $space_image = $category->space_image;
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image = $request->file('image')->store('categories');
        }
        if($request->hasFile('space_image')){
            Storage::delete($category->space_image);
            $space_image = $request->file('space_image')->store('categories');
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'space_image' => $space_image
        ]);

        return to_route('admin.categories.index')->with('success', 'Категория обновлена успешно!');
    }

    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        Storage::delete($category->space_image);
        $category->delete();

        return to_route('admin.categories.index')->with('danger', 'Категория удалена успешно!');
    }
}
