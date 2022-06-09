<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = Gallery::all();
        return view('admin.galleries.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('image')->store('gallery');

        Gallery::create([
            'image' => $image
        ]);

        return to_route('admin.galleries.create')->with('success', 'Фотография добавлена успешно!');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $image = $gallery->image;
        if($request->hasFile('image')){
            Storage::delete($gallery->image);
            $image = $request->file('image')->store('gallery');
        }

        $gallery->update([
            'image' => $image
        ]);

        return to_route('admin.galleries.index')->with('success', 'Фотография обновлена успешно!');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::delete($gallery->image);
        $gallery->delete();

        return to_route('admin.galleries.index')->with('danger', 'Фотография удалена успешно!');
    }
}
