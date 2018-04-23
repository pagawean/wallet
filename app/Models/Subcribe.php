<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcribe extends Model
{

    protected $fillable = [
        'from_id',
        'to_id',
    ];

//    public function from()
//    {
//        return $this->belongsTo('App\Models\Channel', 'from_id');
//    }

    public function to()
    {
        return $this->belongsTo('App\Models\Channel', 'to_id');
    }
}
