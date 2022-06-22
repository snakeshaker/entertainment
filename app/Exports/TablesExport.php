<?php

namespace App\Exports;

use App\Models\Table;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TablesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Table::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Название',
            'Вместимость',
            'Местоположение',
            'Дата создания',
            'Дата редактирования'
        ];
    }
}
