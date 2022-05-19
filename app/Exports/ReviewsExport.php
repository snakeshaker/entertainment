<?php

namespace App\Exports;

use App\Models\Review;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReviewsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Review::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Имя',
            'ID пользователя',
            'ID категории',
            'Текст отзыва',
            'Тип отзыва',
            'Дата создания',
            'Дата редактирования'
        ];
    }
}
