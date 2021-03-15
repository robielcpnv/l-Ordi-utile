<?php
/*
File name       : UserController.php
Begin           : 2021-03-11
Last Update     : 2021-03-15

Description     : controller for the userss

Author          :Tesfazghi  robiel
*/

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller

{
    //show the list of user in group of 20
    public function index(){
        $users = User::paginate(20);
        return view('users.index', compact('users'));
    }
    //link to the create user form
    public function create(){
        return view('users.create');
    }
    //store the input from the create form
    public function store(Request $request){
        //validate our input
        $this->validate($request,[
             'nom' => ['required','max:60','min:3'],
             'prenom' => ['required','max:60','min:3'],
             'role' => 'required',
             'email' => ['required','max:60','email'],
             'password' => 'required'
        ]);
            //create a user
        User::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'role'=>$request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password) // encrype our password
        ]);
        return redirect()->route('users.index'); // redirect to the user list
    }
    /* show the user page */
    public function show(User $user){

        
        $id = DB::table('profiles')->where('email',$user->email)->value('id');//get profile id
        $profile = DB::table('profiles')->where('id',$id)->first(); // get user profile
        $new_user = DB::table('userlogs')->where('user_id',auth()->user()->id)->first();//if it is his time logging
        $user_log = DB::table('userlogs')->where('user_id',$user->id)->first(); //if the user ever loggin

        /* if it is his first time logging don't pass the userlogs table */
        if(!$new_user){ 
            /* if he is a new user don't pass the profile table */          
            if ($id) {           
                $localite = DB::table('localites')->where('id',$profile->localite_id)->first();
                $formation = DB::table('formations')->where('id',$profile->formation_id)->first();
                $langue = DB::table('langues')->where('id',$profile->langue_id)->first();
                return view('users.show',compact('id','profile','localite','formation','langue','user'));
            } else {
                return view('users.show',compact('id','profile','user'));
            }
            
        } else {            
            if ($id) {                
                $localite = DB::table('localites')->where('id',$profile->localite_id)->first();
                $formation = DB::table('formations')->where('id',$profile->formation_id)->first();
                $langue = DB::table('langues')->where('id',$profile->langue_id)->first();
                return view('users.show',compact('id','profile','localite','formation','langue','user','new_user','user_log'));
            } else {
                return view('users.show',compact('id','profile','user','new_user','user_log'));
            }
        }
    }
    /* link to the users edit form */
    public function edit(User $user){

        return view('users.edit',compact('user'));
    }
    /* updat the user from the edit form */
    public function update(User $user ){
        /* validate the input */
        $data = request()->validate([
            'nom' => ['required','max:60','min:3'],
            'prenom' => ['required','max:60','min:3'],
            'password' => 'required|confirmed',
        ]);
       $user->update($data);//update the table
       $user->password = Hash::make(request()->password); //encrypt our update table
       $user->save();//save the new password


       return redirect('users/'.$user->id);//redirect to the user page
    }
    //delete user
    public function destroy(User $user){
        Profile::where('email',$user->email)->delete();// profile first
        $user->delete(); //delete user       
        return redirect('users');//redirect to the user list
    }
    

}
