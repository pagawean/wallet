<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disbursement extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['channel_id','value', 'status'];

    public function channel()
    {
        return $this->belongsTo('App\Models\Channel', 'channel_id');
    }


}