<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentTag extends Model
{
    protected $fillable = [
    	'content_id',
    	'tag_id'
	];

    protected $dates = ['deleted_at'];

    public function content()
    {
        return $this->belongsTo('App\Models\Content', 'content_id');
    }
}


