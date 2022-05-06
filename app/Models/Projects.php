<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $fillables = [
        'is_publish',
        'is_top' ,
        'goal',
        'raised',
        'location',
        'title',
        'date',
        'story',
        'cause',
        'feature_image'
    ];
}
