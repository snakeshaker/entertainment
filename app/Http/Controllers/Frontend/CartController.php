<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\Reservation;
use App\Models\Song;
use App\Models\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::all();
        $menus = Menu::all();
        $songs = Song::all();
        $tables = Table::all();
        $categories = Category::all();
        return view('cart.index', compact('cart', 'menus', 'songs', 'tables', 'categories'));
    }

    public function add(Request $request)
    {
        $menu_id = $request->input('menu_id');
        $song_id = $request->input('song_id');
        $res_id = $request->input('res_id');
        $res_date = $request->input('res_date');

        if (Auth::check()) {
            $menu_check = Menu::where('id', $request->menu_id)->first();
            $song_check = Song::where('id', $request->song_id)->first();
            $res_check = Table::where('id', $request->res_id)->first();

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
            } else if ($song_check) {
                if (Cart::where('song_id', $song_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => 'exists']);
                } else {
                    $cartItem = new Cart();
                    $cartItem->song_id = $song_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->menu_qty = 1;
                    $cartItem->save();
                    return response()->json(['status' => 'success']);
                }
            } else if ($res_check) {
                if (Cart::where('res_id', $res_id)->where('res_date', $res_date)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => 'exists']);
                } else {
                    $cartItem = new Cart();
                    $cartItem->res_id = $res_id;
                    $cartItem->res_date = $res_date;
                    $cartItem->user_id = Auth::id();
                    $cartItem->menu_qty = 1;
                    $cartItem->guest_number = $request->guest_number;
                    $cartItem->save();
                    return response()->json(['status' => 'success']);
                }
            }
        } else {
            return response()->json(['status' => 'login']);
        }
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return to_route('cart.index');
    }

    public function create()
    {
        Cart::truncate();
        return to_route('cart.index');
    }

    public function createOrder(Request $request)
    {
        for ($i = 0; $i < count($request->res_dates); $i++) {
            if(Reservation::where('res_date', $request->res_date)) {
                continue;
            } else {
                Reservation::create([
                    'user_id' => Auth::id(),
                    'first_name' => Auth::user()->first_name,
                    'last_name' => Auth::user()->last_name,
                    'email' => Auth::user()->email,
                    'tel_number' => Auth::user()->tel_number,
                    'res_date' => $request->res_dates[$i],
                    'table_id' => $request->table_ids[$i],
                    'guest_number' => $request->guests[$i]
                ]);
            }
        }
        Order::create([
            'user_id' => Auth::id(),
            'code' => $request->code,
            'pay' => $request->pay,
            'total' => $request->amount / 7.4,
            'check' => $request->check,
        ]);
        if($request->pay == 3) {
            $request->resArr = [];
            $request->songArr = [];
        }
        OrderInfo::create([
            'order_id' => Order::all()->last()->id,
            'delivery_info' => $request->deliveryInfo,
            'food_info' => $request->foodsArr,
            'res_info' => $request->resArr,
            'song_info' => $request->songArr,
        ]);

        Cart::truncate();
    }
}
