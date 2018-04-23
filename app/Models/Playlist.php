<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{

    protected $fillable = [
        'channel_id',
        'name',
    ];

    public function channel()
    {
        return $this->belongsTo('App\Models\Channel', 'channel_id');
    }

    public function playlist_detail()
    {
        return $this->hasMany('App\Models\PlaylistDetail', 'playlist_id');
    }
}
