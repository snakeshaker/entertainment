<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsStoreRequest $request)
    {
        $image = $request->file('image')->store('news');

        News::create([
            'news_title' => $request->news_title,
            'news_text' => $request->news_text,
            'image' => $image
        ]);

        return to_route('admin.news.index')->with('success', 'Новость создана успешно!');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'news_title' => 'required',
            'news_text' => 'required'
        ]);
        $image = $news->image;
        if($request->hasFile('image')){
            Storage::delete($news->image);
            $image = $request->file('image')->store('news');
        }

        $news->update([
            'news_title' => $request->news_title,
            'news_text' => $request->news_text,
            'image' => $image
        ]);

        return to_route('admin.news.index')->with('success', 'Новость обновлена успешно!');
    }

    public function destroy(News $news)
    {
        Storage::delete($news->image);
        $news->delete();

        return to_route('admin.news.index')->with('danger', 'Новость удалена успешно!');
    }
}
