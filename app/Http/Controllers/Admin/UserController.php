<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserStoreRequest $request)
    {
        User::create([
            'first_name' =>  $request->first_name,
            'last_name' =>  $request->last_name,
            'birthday' =>  $request->birthday,
            'tel_number' =>  $request->tel_number,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10)
        ]);

        return to_route('admin.users.index')->with('success', 'Пользователь создан успешно!');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'first_name' =>  $request->first_name,
            'last_name' =>  $request->last_name,
            'birthday' =>  $request->birthday,
            'tel_number' =>  $request->tel_number,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10)
        ]);

        return to_route('admin.users.index')->with('success', 'Пользователь обновлен успешно!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return to_route('admin.users.index')->with('danger', 'Пользователь удален успешно!');
    }

    public function show()
    {
        return Excel::download(new UsersExport, 'пользователи.xlsx');
    }
}
