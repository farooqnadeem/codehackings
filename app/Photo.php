<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    //protected $primaryKey='photo_id';
    protected $fillable=['file'];

    protected $uploads=  '/images/';

    public function getFileAttribute($photo)
    {
        return    url('/').$this->uploads.$photo;
    }
}
