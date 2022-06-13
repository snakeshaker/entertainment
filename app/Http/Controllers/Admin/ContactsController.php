<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    private array $contacts = [
        'address' => 'г. Алматы, улица Сатпаева 90/5',
        'number' => '+7 776 871 9177',
        'email' => 'alik_99_99@list.ru',
        'time1' => 'ПН - ВЫХОДНОЙ',
        'time2' => 'ВТ-ВС - с 15.00 до 02.00'
    ];

    public function index()
    {
        $contacts = $this->contacts;
        return view('admin.contacts.index', compact('contacts'));
    }

    public function update(Request $request)
    {
        $this->contacts['address'] = $request->address;
        $this->contacts['number'] = $request->number;
        $this->contacts['email'] = $request->email;
        $this->contacts['time1'] = $request->time1;
        $this->contacts['time2'] = $request->time2;

        $contacts = $this->contacts;
        return view('admin.contacts.index', compact('contacts'));
    }
}
