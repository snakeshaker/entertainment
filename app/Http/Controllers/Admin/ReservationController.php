<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReservationsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Maatwebsite\Excel\Facades\Excel;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $tables = Table::where('status', 'like', '%Свободен%')->get();
        return view('admin.reservations.create', compact('tables'));
    }

    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number){
            return back()->with('warning', 'Кол-во гостей превышает максимально допустимое для данного места');
        }

        Reservation::create($request->all());

        return to_route('admin.reservations.index')->with('success', 'Бронирование выполнено успешно!');
    }

    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', 'like', '%Свободен%')->get();

        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number){
            return back()->with('warning', 'Кол-во гостей превышает максимально допустимое для данного места');
        }

        $reservation->update([
            'user_id' => 1,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'tel_number' => $request->tel_number,
            'res_date' => $request->res_date,
            'guest_number' => $request->guest_number,
            'table_id' => $request->table_id
        ]);

        return to_route('admin.reservations.index')->with('success', 'Бронирование обновлено успешно!');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return to_route('admin.reservations.index')->with('danger', 'Бронирование удалено успешно!');
    }

    public function show()
    {
        return Excel::download(new ReservationsExport, 'Бронирования.xlsx');
    }
}
