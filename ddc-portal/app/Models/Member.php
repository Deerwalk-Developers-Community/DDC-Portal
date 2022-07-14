<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'github',
        'linkedin',
        'image',
        'role'
    ];

    protected $attributes = [
        'bio' => '',
        'role' => 'executive-member',
        'github' => '',
        'linkedin' => ''
    ];
}
