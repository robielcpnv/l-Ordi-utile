<?php
/*
File name       : ProfileController.php
Begin           : 2021-03-11
Last Update     : 2021-03-15

Description     : controller for the profilles

Author          :Tesfazghi  robiel
*/

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Langue;
use App\Models\Localite;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function __construct()
    {
        //show profile onlyif use connect
        $this->middleware('auth');
    }
    //list of profile !! its function is pass to other function do it do nothing
    public function index(){
        $profiles = Profile::all();

        return view('profiles.index', compact('profiles'));
    }
    //for create a new profile link to the create profile form
    public function create(Request $request){
        //select all from the model i need for the create profile form
        $localites = Localite::all();
        $formations = Formation::all();
        $langues = Langue::all();
        //passing user email to the profile
        $email = DB::table('users')->where('id',$request->user)->value('email');
        //create new profile
        $profile = new Profile();
        return view('profiles.create', compact('localites','formations','langues','profile','email')); 
    }
 /* store the profile from the create profile form */
    public function store(Request $request){
        //use the validateRequest to validate the input and user email from hidden input
        $profile = Profile::create($this->validateRequest()+['email'=>$request->email,]);
        //store our image to the created profile
        $this->storeImage($profile);


        return redirect('compte');//redirect to the CompteController
    }
    //show the user profile
    public function show(Profile $profile){
        return view('profiles.show', compact('profile'));
    }
    //link to the edit profile form
    public function edit(Profile $profile){
        //all the necessaryy model
        $localites = Localite::all();
        $formations = Formation::all();
        $langues = Langue::all();
        $users = User::all();

        return view('profiles.edit', compact('localites','formations','langues','profile','users'));
    }
    //store the input from the edit profile form
    public function update(Profile $profile){
            //validate our input
            $data = $this->validateRequest();
            $this->storeImage($profile);//pass our input to the storeImage function
            //create the profile column with the user email
            $profile->update($data+
            ['email'=>$profile->email]);

        return redirect('compte'); //redirect to the CompteController

    }
    /* validate our in put beacuse we are going to use it in the edit and create function */
    private function validateRequest(){
        return tap( request()->validate([
                'date_de_naissance' => 'required',
                'telephone'=> 'required',
                'adresse' => 'required',
                'localite_id' => 'required',
                'formation_id'=> 'required',
                'titre'=>'required',
                'langue_id'=> 'nullable',
                'responsable_nom'=> ['required' ,'max:60'],
                'responsable_prenom'=> ['required','max:60'],
                'responsable_telephone' => 'required',
                'responsable_email' => ['required','email'],
                'remarque'=>'nullable',
                'confident_remarque'=>'nullable',

            ]), function (){ //addtional function for validate our image if it is insert
                    if(request()->hasFile('image')){
                        request()->validate([
                            'image' =>['file','image','max:2000']
                    ]);

                }
        });

    }
    /* this function will check if there is an image in the request if there is it will store it is the public folder */
    private function storeImage($profile){
        if (request()->has('image')){
            $profile->update([
                'image'=> request()->image->store('uploads','public'),
                ]);
        }
    }

   

}
