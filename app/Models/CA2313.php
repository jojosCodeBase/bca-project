<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CA2313 extends Model
{
    use HasFactory;

    protected $table = 'CA2313';

    protected $fillable = [
        'regno',
        'q1',
        's1',
        'q2',
        's2',
        'assignment',
        'end_sem',
        'total',
    ];
}
