<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class WelcomeController extends Controller
{
    public function index()
    {
        $news = News::latest()->take(3)->get();
        return view('welcome', compact('news'));
    }

    public function thankyou()
    {
        return view('thankyou');
    }
}
