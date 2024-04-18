<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Courses extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'cid',
        'cname',
        'assigned',
    ];
}
