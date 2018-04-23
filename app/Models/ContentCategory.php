<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentCategory extends Model
{
    protected $fillable = ['name'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}