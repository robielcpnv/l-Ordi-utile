<?php
/* File name    : Formation.php
Begin           : 2021-03-09
Last Update     : 2021-03-09

Description     : Model for the table formation

Author          :Tesfazghi  robiel
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    //none of the field are guarded they can filled with data
    protected $guarded = [];

    //table formation has one to many relationships to with table profile
    public function profiles(){
        return $this->hasMany(Profile::class);
    }
}
