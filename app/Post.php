<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'photo_id', 'user_id'
    ];

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

}
