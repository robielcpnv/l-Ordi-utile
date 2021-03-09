<?php

namespace App\Http\Controllers\compte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index (){
        return view('compte.index');
    }
}
