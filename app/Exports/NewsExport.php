<?php

namespace App\Exports;

use App\Models\News;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NewsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return News::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Заголовок',
            'Текст новости',
            'Картинка',
            'Дата создания',
            'Дата редактирования'
        ];
    }
}
