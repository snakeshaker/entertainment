<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechSupportStoreRequest;
use App\Models\TechSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechSupportController extends Controller
{
    public function index()
    {
        return view('tech-support.index');
    }

    public function store(TechSupportStoreRequest $request)
    {
        TechSupport::create([
            'user_id' => Auth::user()->id,
            'issue' =>  $request->issue
        ]);

        return to_route('tech-support.index')->with('success', 'Заявка отправлена успешно!');
    }
}
