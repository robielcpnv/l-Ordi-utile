<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    //none of the field are guarded they can filled with data
    protected $guarded = [];

    //table confident has one to many relationships to with table profile
    public function confident (){
        return $this->belongsTo(Confident::class);
    }

    //table formation has one to many relationships to with table profile
    public function formation (){
        return $this->belongsTo(Confident::class);
    }

    //table langue has one to many relationships to with table profile
    public function langue (){
        return $this->belongsTo(Confident::class);
    }

    //table localite has one to many relationships to with table profile
    public function localite (){
        return $this->belongsTo(Confident::class);
    }


    //table user has one to many relationships to with table profile
    public function user (){
        return $this->belongsTo(Confident::class);
    }
}
