<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TablesExport;
use App\Exports\TechSupportsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use App\Models\Category;
use App\Models\Table;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index', compact('tables'));
    }

    public function create()
    {
        $categories = Category::where('id', '!=', 1)->get();

        return view('admin.tables.create', compact('categories'));
    }

    public function store(TableStoreRequest $request)
    {
        Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'category_id' => $request->category_id
        ]);

        return to_route('admin.tables.index')->with('success', 'Место создано успешно!');
    }

    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table'));
    }

    public function update(TableStoreRequest $request, Table $table)
    {
        $checkbox = isset($request->is_active[0]) ? 1 : 0;

        $table->update([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'is_active' => $checkbox
        ]);

        return to_route('admin.tables.index')->with('success', 'Место обновлено успешно!');
    }

    public function show()
    {
        return Excel::download(new TablesExport, 'Места для бронирования.xlsx');
    }
}
