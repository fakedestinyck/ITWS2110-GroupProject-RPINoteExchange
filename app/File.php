<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $uploads = 'files/';
    protected $fillable = ['file'];
    public function getFileAttribute($file){
        return $this->uploads . $file;
    }
}
