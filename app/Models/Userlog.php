<?php
/* File name    : Userl0g.php
Begin           : 2021-03-12
Last Update     : 2021-03-12

Description     : Model for the table Userlog

Author          :Tesfazghi  robiel
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlog extends Model
{
    use HasFactory;

    //none of the field are guarded they can filled with data
    protected $guarded = [];

    //table confident has one to many relationships to with table user
    public function user (){
        return $this->belongsTo(User::class);
    }
}
