<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $foodCategories = FoodCategory::all();
        return view('menus.index', compact('menus', 'foodCategories'));
    }

    public function show(FoodCategory $foodCategory)
    {
        $menus = $foodCategory->menus;
        $foodCategories = FoodCategory::all();
        return view('menus.show', compact('menus', 'foodCategories'));
    }
}
