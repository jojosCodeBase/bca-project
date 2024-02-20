<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CA1601 extends Model
{
    use HasFactory;

    protected $table = 'CA1601';

    protected $filable = [
        'regno',
        'cid',
        'name',
        'q1',
        's1_50',
        's1_15',
        'q2',
        's2_50',
        's2_15',
        'assignment',
        'attendance',
        'total',
    ];
}
