<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $contact = Contact::all()->first();
        return view('admin.contacts.index', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = Contact::all()->first();
        $contact->update([
            'address' => $request->address,
            'number' => $request->number,
            'email' => $request->email,
            'time' => $request->time
        ]);

        return to_route('admin.contacts.index')->with('success', 'Данные обновлены успешно.');
    }
}
