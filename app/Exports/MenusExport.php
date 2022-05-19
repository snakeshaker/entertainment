<?php

namespace App\Exports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MenusExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Menu::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Название',
            'Описание',
            'Картинка',
            'Цена',
            'Дата создания',
            'Дата редактирования'
        ];
    }
}
