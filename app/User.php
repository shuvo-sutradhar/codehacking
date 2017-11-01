<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','is_active','',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    //setup relation with role model
    public function role(){
        return $this->belongsTo('App\Role');
    }

    //setup relation with photo model
    public function photo(){
        return $this->belongsTo('App\Photo');
    }


    public function isAdmin(){

        if ($this->role->name == "administrator") {
            return true;
        }

        return false;

    }
}
