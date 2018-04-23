<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueryLook extends Model
{
    protected $table = "query_look";
    protected $fillable = ['channel_id','video_category_id','title','image','path','description','count_looks'];

    protected $appends  = ['count_love', 'count_comment'];

    public function getCountLoveAttribute()
    {
        return $this->loves->count();
    }

    public function getCountLookAttribute()
    {
        return $this->looks->count();
    }

    public function getCountCommentAttribute()
    {
        return $this->comments->count();
    }

    public function channel()
    {
        return $this->belongsTo('App\Models\Channel', 'channel_id');
    }

    public function video_category()
    {
        return $this->belongsTo('App\Models\VideoCategory', 'video_category_id');
    }

    public function loves()
    {
        return $this->hasMany('App\Models\Love', 'video_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'video_id');
    }

    public function playlist()
    {
        return $this->hasMany('App\Models\Playlist', 'video_id');
    }


}