<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return to_route('mainpage');
    }
}
