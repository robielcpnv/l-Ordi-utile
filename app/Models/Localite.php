<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    use HasFactory;

    //none of the field are guarded they can filled with data
    protected $guarded = [];

    //table localite has one to many relationships to with table profile
    public function profiles(){
        return $this->hasMany(Profile::class);
    }
}
