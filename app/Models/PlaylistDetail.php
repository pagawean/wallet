<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaylistDetail extends Model
{

    protected $fillable = [
        'video_id',
        'playlist_id',
        'name',
    ];

    public function video()
    {
        return $this->belongsTo('App\Models\Video', 'video_id');
    }

    public function playlist()
    {
        return $this->belongsTo('App\Models\Playlist', 'playlist_id');
    }
}
