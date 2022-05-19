<?php

namespace App\Exports;

use App\Models\FoodCategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FoodCategoriesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FoodCategory::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Название',
            'Дата создания',
            'Дата редактирования'
        ];
    }
}
