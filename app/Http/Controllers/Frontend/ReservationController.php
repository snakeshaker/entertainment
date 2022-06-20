<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function show()
    {
        $reservations = Reservation::select('res_date','table_id')->get();;
        return $reservations;
    }

    public function cartRes()
    {
        $res = Cart::select('res_id', 'res_date')->get();
        return $res;
    }
}
