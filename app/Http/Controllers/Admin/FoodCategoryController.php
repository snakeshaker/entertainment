<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function index()
    {
        $categories = FoodCategory::all();
        return view('admin.food-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.food-categories.create');
    }

    public function store(Request $request)
    {
        FoodCategory::create([
            'name' => $request->name
        ]);

        return to_route('admin.food-categories.index')->with('success', 'Категория создана успешно.');
    }

    public function edit(FoodCategory $foodCategory)
    {
        return view('admin.food-categories.edit', compact('foodCategory'));
    }

    public function update(Request $request, FoodCategory $foodCategory)
    {
        $foodCategory->update([
            'name' => $request->name
        ]);

        return to_route('admin.food-categories.index')->with('success', 'Категория обновлена успешно.');
    }

    public function destroy(FoodCategory $foodCategory)
    {
        $foodCategory->menus()->detach();
        $foodCategory->delete();
        return to_route('admin.food-categories.index')->with('danger', 'Категория удалена успешно.');
    }
}
