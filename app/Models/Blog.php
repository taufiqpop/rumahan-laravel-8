<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    // protected $guarded = ['id'];
    protected $fillable = ['title', 'body', 'created_at'];
}
