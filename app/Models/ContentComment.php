<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentComment extends Model
{
    protected $fillable = ['content_id','channel_id', 'comment'];

    public function content()
    {
        return $this->belongsTo('App\Models\Content', 'content_id');
    }

    public function channel()
    {
        return $this->belongsTo('App\Models\Channel', 'channel_id');
    }


}