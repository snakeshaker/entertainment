<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechSupportStoreRequest;
use App\Models\TechSupport;
use Illuminate\Http\Request;

class TechSupportController extends Controller
{
    public function index()
    {
        $tech_supports = TechSupport::all();
        return view('admin.tech-support.index', compact('tech_supports'));
    }

    public function create()
    {
        return view('admin.tech-support.create');
    }

    public function store(TechSupportStoreRequest $request)
    {
        TechSupport::create([
            'user_id' => 1,
            'issue' =>  $request->issue
        ]);

        return to_route('admin.tech-support.index')->with('success', 'Заявка создана успешно!');
    }

    public function edit(TechSupport $tech_support)
    {
        return view('admin.tech-support.edit', compact('tech_support'));
    }

    public function update(Request $request, TechSupport $tech_support)
    {
        $tech_support->update([
            'user_id' => 1,
            'issue' =>  $request->issue
        ]);

        return to_route('admin.tech-support.index')->with('success', 'Заявка обновлена успешно!');
    }

    public function destroy(TechSupport $tech_support)
    {
        $tech_support->delete();
        return to_route('admin.tech-support.index')->with('danger', 'Заявка удалена успешно!');
    }
}
