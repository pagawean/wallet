<?php

namespace App\Models;

use App\Libraries\Sluggable\SlugOptions;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
        'key',
        'value',
    	'type',
    	'title',
    ];

//    public function content_category()
//    {
//        return $this->belongsTo('App\Models\ContentCategory', 'content_category_id');
//    }
//
//    public function content_media()
//    {
//        return $this->hasMany('App\Models\ContentMedia', 'content_id');
//    }
//
//    public function content_media_one()
//    {
//        return $this->hasOne('App\Models\ContentMedia', 'content_id');
//    }
//
//    public function content_tag()
//    {
//        return $this->hasMany('App\Models\ContentTag', 'content_id');
//    }
//
//    public function getSlugOptions() : SlugOptions
//    {
//        return SlugOptions::create()
//            ->generateSlugsFrom('title')
//            ->saveSlugsTo('slug');
//    }
}
