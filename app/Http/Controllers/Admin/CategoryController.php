<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CategoriesExport;
use App\Exports\NewsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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
            'res_price' => $request->res_price,
            'description' => $request->description,
            'limit' => $request->limit
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
            'res_price' => $request->res_price,
            'image' => $image,
            'space_image' => $space_image,
            'limit' => $request->limit
        ]);

        return to_route('admin.categories.index')->with('success', 'Категория обновлена успешно!');
    }

    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        Storage::delete($category->space_image);
        $category->reviews()->delete();
        $category->delete();

        return to_route('admin.categories.index')->with('danger', 'Категория удалена успешно!');
    }

    public function show()
    {
        return Excel::download(new CategoriesExport, 'Список развлечений.xlsx');
    }
}
