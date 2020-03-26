<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $uploads = '/images/';

    protected $fillable = ['file'];

    public function imageable(){
        return $this->morphTo('App\Photo', 'imageable');
    }

    /**
     * Accessors
     *
     */
    public function getFileAttribute($photo){
        return $this->uploads.$photo;
    }

}
