<?php
/*
File name       : CompteController.php
Begin           : 2021-03-02
Last Update     : 2021-03-12

Description     : controller for the d'une page de tableau de bord

Author          :Tesfazghi  robiel
*/

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Langue;
use App\Models\Localite;
use App\Models\Userlog;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompteController extends Controller
{
    public function index(){
        
        $new_profile = DB::table('profiles')->where('email',auth()->user()->email)->value('id');//if it has profile
        $profile = DB::table('profiles')->where('email',auth()->user()->email)->first();// get user profile
        $new_user = DB::table('userlogs')->where('id',auth()->user()->id)->first();//if it his first time connect

        //condition if it is first time connect
        if (!$new_user) {
            /* create a new log */
            Userlog::create([
                'user_id'=>auth()->user()->id,
                'adresse_ip'=>request()->ip()
                ]
            );
        }
        else {
            /* find the user log and update it */
            Userlog::where('user_id',auth()->user()->id)->update(array(
                'adresse_ip'=>request()->ip()));
        }
        //condition if it is new profile
        if (!$new_profile) {
            return view('profiles.show',compact('profile'));
        }
         /*  get the connected user full profile */
        $localite = DB::table('localites')->where('id',$profile->localite_id)->first();
        $formation = DB::table('formations')->where('id',$profile->formation_id)->first();
        $langue = DB::table('langues')->where('id',$profile->langue_id)->first();
        return view('profiles.show',compact('profile','localite','formation','langue',));
    }
}
