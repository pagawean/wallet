<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Channel extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $guard = 'channel';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image','channel', 'name','gender', 'email','username', 'password','remember_token', 'phone_number','address', 'avatar','api_id'
    ];

    protected $appends  = ['count_subcribe'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getCountSubcribeAttribute()
    {
        return $this->follower->count();
    }

    public function videos()
    {
        return $this->hasMany('App\Models\Video', 'channel_id');
    }

    public function playlist()
    {
        return $this->hasMany('App\Models\Playlist', 'channel_id');
    }

    public function follow()
    {
        return $this->hasMany('App\Models\Subcribe', 'from_id');
    }

    public function follower()
    {
        return $this->hasMany('App\Models\Subcribe', 'to_id');
    }
}
