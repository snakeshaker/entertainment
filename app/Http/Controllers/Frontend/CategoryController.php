<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Review;
use App\Models\Table;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $reviews = Review::all();
        return view('categories.index', compact('categories', 'reviews'));
    }

    public function show(Category $category)
    {
        $tables = Table::where('location', 'like', $category->name)->get();
        $reviews = Review::where('category_id', 'like', $category->id)->get();
        $degrees = [
            'Отрицательный',
            'Нейтральный',
            'Положительный',
        ];
        return view('categories.show', compact('category', 'tables', 'reviews', 'degrees'));
    }

    public function storeReview(Request $request)
    {
        echo 'hello';
    }
}
