<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaxMarksCO extends Model
{
    use HasFactory;
    protected $table = 'max_marks_co';

    protected $fillable = [
        'cid',
        'q1',
        's1',
        'q2',
        's2',
        'assignment',
        'end_sem',
    ];
}
