<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Review;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $reviews = Review::where('category_id', 'like', $category->id)->orderBy('created_at', 'desc')->paginate(3);
        $degrees = [
            'Отрицательный',
            'Нейтральный',
            'Положительный',
        ];
        return view('categories.show', compact('category', 'tables', 'reviews', 'degrees'));
    }

    public function storeReview(Request $request)
    {
        if(Auth::user()) {
            $user_id = Auth::user()->id;
        } else {
            $user_id = 0;
        }

        Review::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'review_text' => $request->review_text,
            'review_degree' => $request->review_degree,
            'category_id' => $request->category_id
        ]);
        $category = Category::where('id', $request->category_id)->first();
        return to_route('categories.show', compact('category'));
    }
}
