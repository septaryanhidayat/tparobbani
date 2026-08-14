<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_name',
        'child_nickname',
        'birth_date',
        'gender',
        'parent_name',
        'phone',
        'branch',
        'address',
        'notes',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
        ];
    }
}
