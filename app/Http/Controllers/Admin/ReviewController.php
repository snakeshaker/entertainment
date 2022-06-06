<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReviewsExport;
use App\Exports\SongsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewStoreRequest;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        $categories = Category::where('id', '!=', 1)->get();
        return view('admin.reviews.index', compact('reviews', 'categories'));
    }

    public function create()
    {
        $categories = Category::where('id', '!=', 1)->get();
        $degrees = [
            'Отрицательный',
            'Нейтральный',
            'Положительный',
        ];
        return view('admin.reviews.create', compact('categories', 'degrees'));
    }

    public function store(ReviewStoreRequest $request)
    {
        Review::create([
            'user_id' => 1,
            'category_id' => $request->category_id ,
            'name' =>  $request->name,
            'review_text' =>  $request->review_text,
            'review_degree' =>  $request->review_degree
        ]);

        return to_route('admin.reviews.index')->with('success', 'Отзыв создан успешно!');
    }

    public function edit(Review $review)
    {
        $categories = Category::where('id', '!=', 1)->get();
        $degrees = [
            'Отрицательный',
            'Нейтральный',
            'Положительный',
        ];
        return view('admin.reviews.edit', compact('review','categories', 'degrees'));
    }

    public function update(Request $request, Review $review)
    {
        $review->update([
            'name' =>  $request->name,
            'category_id' =>  $request->category_id,
            'review_text' =>  $request->review_text,
            'review_degree' =>  $request->review_degree
        ]);

        return to_route('admin.reviews.index')->with('success', 'Отзыв обновлен успешно!');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return to_route('admin.reviews.index')->with('danger', 'Отзыв удален успешно!');
    }

    public function show()
    {
        return Excel::download(new ReviewsExport, 'Отзывы.xlsx');
    }
}
