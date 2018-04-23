<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentMedia extends Model
{
	public $table = 'content_medias';
    protected $fillable = [
    	'content_id',
        'name',
        'type_media'
    ];

    public function content()
    {
        return $this->belongsTo('App\Models\Content', 'content_id');
    }
}
