<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';

    protected $fillable = [
        'title',
        'description',
        'mission',
        'vision',
        'history',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
