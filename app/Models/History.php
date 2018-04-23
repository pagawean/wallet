<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['video_id','channel_id','ip'];

    protected $table 	= 'histories';

    public function video()
    {
        return $this->belongsTo('App\Models\Video', 'video_id');
    }
}