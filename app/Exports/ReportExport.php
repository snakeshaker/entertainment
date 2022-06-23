<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Report::all();
    }

    public function headings(): array
    {
        return [
            'Название',
            'Кол-во бронирований',
            'Общий доход',
            'Дата от',
            'Дата до',
            'Дата создания',
            'Дата редактирования'
        ];
    }
}
