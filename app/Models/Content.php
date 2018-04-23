<?php

namespace App\Models;

use App\Libraries\Sluggable\HasSlug;
use App\Libraries\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasSlug;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'slug',
        'type',
    	'content_category_id',
    	'title',
        'subtitle',
        'content_preview',
        'content'
    ];

    public function content_category()
    {
        return $this->belongsTo('App\Models\ContentCategory', 'content_category_id');
    }

    public function content_media()
    {
        return $this->hasMany('App\Models\ContentMedia', 'content_id');
    }

    public function content_media_one()
    {
        return $this->hasOne('App\Models\ContentMedia', 'content_id');
    }

    public function content_tag()
    {
        return $this->hasMany('App\Models\ContentTag', 'content_id');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\ContentComment', 'content_id');
    }
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
