<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('menus');

        $menu = Menu::create([
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return to_route('admin.menus.index')->with('success', 'Блюдо создано успешно!');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));

    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $image = $menu->image;
        if($request->hasFile('image')){
            Storage::delete($menu->image);
            $image = $request->file('image')->store('menus');
        }

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);

        return to_route('admin.menus.index')->with('success', 'Блюдо обновлено успешно!');
    }

    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->delete();

        return to_route('admin.menus.index')->with('danger', 'Блюдо удалено успешно!');

    }
}
