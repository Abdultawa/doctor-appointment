<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Response;
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

    public function respond(Request $request)
{
    $contactId = $request->input('contact_id');
    $contact = Contact::find($contactId);

    if ($contact) {
        $contact->status = 'Responded';
        $contact->save();

        return redirect()->back()->with('success', 'Contact status updated to Responded.');
    }

    return redirect()->back()->with('error', 'Contact not found.');
}




}
