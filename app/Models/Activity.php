<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['title', 'desc', 'icon', 'color', 'image', 'order'];
}
