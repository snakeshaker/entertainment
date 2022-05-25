<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', Auth::id())->get();
        $orders = Order::where('user_id', Auth::id())->get();
        return view('dashboard', compact('user', 'reservations', 'orders'));
    }

    public function deleteUser()
    {
        $user = Auth::user();
        $user->delete();
        return to_route('mainpage');
    }

    public function destroy($id)
    {
        $reservation = Reservation::where('id', $id)->first();
        $reservation->delete();
        $user = Auth::user();
        $reservations = Reservation::where('user_id', Auth::id())->get();
        $orders = Order::where('user_id', Auth::id())->get();
        return to_route('dashboard.index');
    }
}
