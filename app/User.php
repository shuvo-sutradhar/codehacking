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

        if($this->role->name  == "administrator" && $this->is_active == 1){
            return true;
        }

        return false;
    }


    public function post(){
        return $this->hasMany('App\Post');
    }


    public function getGravatarAttribute(){
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash";
    }
}
