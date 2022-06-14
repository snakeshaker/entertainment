<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Contacts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'address' => 'г. Алматы, улица Сатпаева 90/5',
            'number' => '+7 776 871 9177',
            'email' => 'alik_99_99@list.ru',
            'time' => 'ПН - ВЫХОДНОЙ ВТ-ВС - с 15.00 до 02.00'
        ]);
    }
}
