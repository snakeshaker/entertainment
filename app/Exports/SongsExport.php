<?php

namespace App\Exports;

use App\Models\Song;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SongsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Song::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Исполнитель',
            'Название песни',
            'Жанр',
            'Ссылка на видео',
            'Дата создания',
            'Дата редактирования'
        ];
    }
}
