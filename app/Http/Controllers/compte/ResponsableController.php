<?php

namespace App\Http\Controllers\compte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function index (){
        return view('compte.responsable');
    }
}
