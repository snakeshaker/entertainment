<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = DB::table('reviews')->orderBy('id','desc')->paginate(10);
        $categories = Category::all();
        $degrees = [
            'Отрицательный',
            'Нейтральный',
            'Положительный',
        ];
        return view('reviews.index', compact('reviews', 'degrees', 'categories'));
    }

    public function store(Request $request)
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

        return to_route('reviews.index');
    }
}
