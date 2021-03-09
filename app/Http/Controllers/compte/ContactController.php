<?php

namespace App\Http\Controllers\compte;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index (){
        return view('compte.contact');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=> 'required',
            'prenom' => 'required',
            'naissance' => 'required',
            'tel' => 'required',
            'titre'=> 'required' 
        ]);

        Contact::create($request->all());

        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
}
