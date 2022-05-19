<?php

namespace App\Exports;

use App\Models\TechSupport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TechSupportsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return TechSupport::all();
    }

    public function headings(): array
    {
        return [
            'ID заявки',
            'ID пользователя',
            'Текст заявки',
            'Дата создания',
            'Дата редактирования'
        ];
    }
}
