<?php

namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReservationsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reservation::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Имя',
            'Фамилия',
            'Почта',
            'Номер телефона',
            'Дата бронирования',
            'ID места бронирования',
            'Количество гостей',
            'Дата создания',
            'Дата редактирования'
        ];
    }
}
