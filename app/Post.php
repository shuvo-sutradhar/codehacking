<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    //
    protected $fillable = [

        'category_id',
        'photo_id',
        'title',
        'body'

    ];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function category(){
        return $this->belongsTo('App\category');
    }

    public function comments(){

        return $this->hasMany('App\Comment');

    }


    public function placeholderImage(){
        return "http://placehold.it/700x200";
    }

    public function scopeSearch($query, $s){
        return $query->where('title','like','%' .$s. '%')
                ->orWhere('body','like','%' .$s. '%');

    }


}
