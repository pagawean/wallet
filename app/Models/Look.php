<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Look extends Model
{
    protected $fillable = ['video_id','ip','value'];

    public function video()
    {
        return $this->belongsTo('App\Models\Video', 'video_id');
    }
}