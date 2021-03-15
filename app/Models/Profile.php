<?php
/* File name    : Profile.php
Begin           : 2021-03-12
Last Update     : 2021-03-12

Description     : Model for the table profile

Author          :Tesfazghi  robiel
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    //none of the field are guarded they can filled with data
    protected $guarded = [];

    //table formation has one to many relationships to with table profile
    public function formation (){
        return $this->belongsTo(Formation::class);
    }

    //table langue has one to many relationships to with table profile
    public function langue (){
        return $this->belongsTo(Langue::class);
    }

    //table localite has one to many relationships to with table profile
    public function localite (){
        return $this->belongsTo(Localite::class);
    }


    //table user has one to many relationships to with table profile
    public function user (){
        return $this->belongsTo(Confident::class);
    }
}
