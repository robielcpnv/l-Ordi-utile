<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Langue;
use App\Models\Localite;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $profiles = Profile::all();

        return view('profiles.index', compact('profiles'));
    }

    public function create(){
        
        //select all from the model i need for the create profile form
        $localites = Localite::all();
        $formations = Formation::all();
        $langues = Langue::all();

        $profile = new Profile();
        return view('profiles.create', compact('localites','formations','langues','profile'));
    }

    
    public function store(Request $request){
        
        $data = request()->validate([
            'confident_id',
            'nom' => 'required|min:3',
            'prenom' => 'required|min:3',
            'date_de_naissance' => 'required|date',
            //'telephone' => 'required',
            'adresse' => 'required',
            'localite_id' => 'required',
            'formation_id'=> 'required',
            'titre'=>'required',
            'langue_id'=> 'required',
            //'responsable_nom' => 'required',
            //'responsable_prenom' => 'required',
            'responsable_telephone' => 'required',
            'responsable_email' => 'required|email',
        ]);
        
        /* $this->authorize('create',Profile::class);
        dd('ok');
        
        $profile = Profile::create($this->validateRequest());
         */
        
        Profile::create($data);
        
        return redirect('profiles');
    }

    public function show(Profile $profile){

        return view('profiles.show', compact('profile'));
    }

    public function edit(Profile $profile){

        $localites = Localite::all();
        $formations = Formation::all();
        $langues = Langue::all();
        
        return view('profiles.edit', compact('localites','formations','langues','profile'));
    }

    public function update(Profile $profile){
        $profile->update($this->validateRequest());
         return redirect('profiles/'. $profile->id); 
    }

    private function validateRequest(){
        return request()->validate([
            'nom' => 'required|min:3',
            'prenom' => 'required|min:3',
            'date_de_naissance' => 'required|date',
            'telephone' => 'required',
            'adresse' => 'required',
            'localite_id' => 'required',
            'formation_id'=> 'require',
            'titre'=>'required',
            'langue_id'=> 'required',
            'responsable_nom' => 'required|min:3',
            'responsable_prenom' => 'required|min:3',
            'responsable_telephone' => 'required',
            'responsable_email' => 'required|email',
        ]);
    }
}
