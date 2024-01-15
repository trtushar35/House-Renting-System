<?php

namespace App\Http\Controllers\backend;

use App\Models\House;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlatController extends Controller
{
    public function list(){
        $Flats = House::all();

        return view('backend.pages.flat.list', compact('Flats'));
    }

    public function view($house_id)
    {
        // dd($house_id);
        $houses=House::find($house_id);
        return view('backend.pages.flat.view', compact('houses'));
        
    }

    public function flatPrint()
    {
        $Flats = House::all();
        return view('backend.pages.flat.print', compact('Flats'));
    }

    public function contact()
    {
        $contacts = Contact::all();
        return view('backend.pages.contact.list', compact('contacts'));
    }

    public function delete($id)
    {
        // dd($id);
        $contacts = Contact::find($id);
        if ($contacts) {
            $contacts->delete();
        }
        notify()->success('Delete successful.');
        return redirect()->route('contacts.list');
    }
}
