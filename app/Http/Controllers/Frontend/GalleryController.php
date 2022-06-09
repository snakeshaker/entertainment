<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = DB::table('galleries')->orderBy('id','desc')->paginate(18);
        return view('gallery.index', compact('photos'));
    }
}
