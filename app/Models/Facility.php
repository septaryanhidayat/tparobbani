<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = ['title', 'desc', 'image', 'tag', 'order'];
}
