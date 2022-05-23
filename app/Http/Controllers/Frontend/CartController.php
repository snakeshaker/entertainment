<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        echo 'Корзина в разработке';
    }

    public function add(Request $request)
    {
        $menu_id = $request->input('menu_id');

        if (Auth::check()) {
            $menu_check = Menu::where('id', $request->menu_id)->first();

            if ($menu_check) {
                if (Cart::where('menu_id', $menu_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => 'exists']);
                } else {
                    $cartItem = new Cart();
                    $cartItem->menu_id = $menu_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->menu_qty = 1;
                    $cartItem->save();
                    return response()->json(['status' => 'success']);
                }
            }
        } else {
            return response()->json(['status' => 'login']);
        }
    }
}
