<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Love extends Model
{
    protected $fillable = ['video_id','channel_id','ip','value'];

    protected $table 	= 'loves';

    public function video()
    {
        return $this->belongsTo('App\Models\Video', 'video_id');
    }
}