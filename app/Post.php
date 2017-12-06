<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'major_id', 'material_type_id', 'share_or_ask', 'free_or_paid', 'content', 'file_id', 'is_shown', 'requestedBy'
    ];

    public function file(){

        return $this->belongsTo('App\File');

    }
}
