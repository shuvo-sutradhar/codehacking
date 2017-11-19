<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
	use SoftDeletes;
    //
    protected $table = "blog";
    
	protected $dates = ['deleted_at'];
    protected $fillable = [
    	'title',
    	'content'
    ];
}
