<?php
/* File name    : User.php
Begin           : 2021-03-02
Last Update     : 2021-03-12

Description     : Model for the table User

Author          :Tesfazghi  robiel
*/

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom','prenom','role','email','password',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     //table user has one to one relationships to with table profile
     public function profile(){
        return $this->hasOne(Profile::class);
    }
    //table user has one to one relationships to with table profile
    public function log(){
        return $this->hasMany(Userlog::class);
    }
}
