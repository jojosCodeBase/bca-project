<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CA1603 extends Model
{
    use HasFactory;

    protected $table = 'CA1603';

    protected $fillable = [
        'regno',
        'q1',
        's1',
        'q2',
        's2',
        'assignment',
        'attendance',
        'total',
    ];
}
