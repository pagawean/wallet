<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    protected $table = "contact_us";
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','email','massage'];
}