<?php
/* File name    : Langue.php
Begin           : 2021-03-09
Last Update     : 2021-03-09

Description     : Model for the table Langue

Author          :Tesfazghi  robiel
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    use HasFactory;

   //none of the field are guarded they can filled with data
   protected $guarded = [];

    //table langue has one to many relationships to with table profile
    public function profiles(){
        return $this->hasMany(Profile::class);
    }
}
