<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'title', 'content', 'photo_id', 'user_id'
    ];

    protected $dates = ['deleted_at'];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function placeholder(){
        return '/images/placeholder.png';
    }

}
