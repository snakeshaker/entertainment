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
        $locations = Category::where('id', '!=', 1)->get();
        $statuses = [
          'Свободен',
          'Занят'
        ];
        return view('admin.tables.create', compact('locations', 'statuses'));
    }

    public function store(TableStoreRequest $request)
    {
        Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location,
        ]);

        return to_route('admin.tables.index')->with('success', 'Место создано успешно!');
    }

    public function edit(Table $table)
    {
        $locations = Category::where('id', '!=', 1)->get();
        $statuses = [
            'Свободен',
            'Занят'
        ];
        return view('admin.tables.edit', compact('table', 'locations', 'statuses'));
    }

    public function update(TableStoreRequest $request, Table $table)
    {
        $table->update($request->validated());

        return to_route('admin.tables.index')->with('success', 'Место обновлено успешно!');
    }

    public function destroy(Table $table)
    {
        $table->delete();
        $table->reservations()->delete();

        return to_route('admin.tables.index')->with('danger', 'Место удалено успешно!');
    }

    public function show()
    {
        return Excel::download(new TablesExport, 'Места для бронирования.xlsx');
    }
}
