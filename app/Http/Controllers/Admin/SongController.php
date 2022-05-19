<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SongsExport;
use App\Exports\TablesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\SongStoreRequest;
use App\Models\Song;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('admin.songs.index', compact('songs'));
    }

    public function create()
    {
        return view('admin.songs.create');
    }

    public function store(SongStoreRequest $request)
    {
        Song::create([
            'singer' => $request->singer,
            'song_name' => $request->song_name,
            'genre' => $request->genre,
            'video_link' => $request->video_link
        ]);

        return to_route('admin.songs.index')->with('success', 'Песня создана успешно!');
    }

    public function edit(Song $song)
    {
        return view('admin.songs.edit', compact('song'));
    }

    public function update(Request $request, Song $song)
    {
        $request->validate([
            'singer' => 'required',
            'song_name' => 'required',
            'genre' => 'required',
            'video_link' => 'required'
        ]);

        $song->update([
            'singer' => $request->singer,
            'song_name' => $request->song_name,
            'genre' => $request->genre,
            'video_link' => $request->video_link
        ]);

        return to_route('admin.songs.index')->with('success', 'Песня обновлена успешно!');
    }

    public function destroy(Song $song)
    {
        $song->delete();
        return to_route('admin.songs.index')->with('danger', 'Песня удалена успешно!');
    }

    public function show()
    {
        return Excel::download(new SongsExport, 'Список песен.xlsx');
    }
}
