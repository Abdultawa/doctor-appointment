<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function get()
    {
         $contacts =Contact::get();
        return view('admin.contact',compact('contacts'));
    }
    public function store(Contact $contact)
    {
        request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);
        $contact->create([
            'name' => request('name'),
            'phone' => request('phone'),
            'message' => request('message')
        ]);

        return back()->with('success', 'Successfully!');
    }
}
