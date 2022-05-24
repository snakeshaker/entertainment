<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    public function deleteUser()
    {
        $user = Auth::user();
        $user->delete();
        return to_route('mainpage');
    }
}
