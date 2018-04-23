<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['video_id','channel_id', 'comment'];

    public function video()
    {
        return $this->belongsTo('App\Models\Video', 'video_id');
    }

    public function channel()
    {
        return $this->belongsTo('App\Models\Channel', 'channel_id');
    }


}