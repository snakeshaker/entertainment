<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('music.index', compact('songs'));
    }
}
