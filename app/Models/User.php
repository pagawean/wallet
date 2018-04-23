<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'id',
        'role_id',
        'username',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

//    public static $rules = [
//        'role_id'     => 'required',
//        'name'        => 'required',
//        'username'    => 'max:16|unique:users,username',
//    ];

//    public static function rules($id='')
//    {
//        return [
//            'role_id'     => 'required',
//            'name'        => 'required',
//            'username'    => 'max:16|unique:users,username,'.Request::segment(2),
//        ];
//    }

    public function event_organizer()
    {
        return $this->hasOne('App\Models\EventOrganizer','user_id','id');
    }

    public function merchant()
    {
        return $this->hasOne('App\Models\Merchant','user_id','id');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }
}
