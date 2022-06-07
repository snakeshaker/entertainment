<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        Reservation::create([
            'user_id' => Auth::id(),
            'first_name' => Auth::user()->first_name,
            'last_name' => Auth::user()->last_name,
            'email' => Auth::user()->email,
            'tel_number' => Auth::user()->tel_number,
            'res_date' => $request->res_date,
            'table_id' => $request->table_id,
            'guest_number' => $request->guest_number
        ]);

        return to_route('dashboard.index');
    }
}
