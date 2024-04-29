<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoreThanSixty extends Model
{
    use HasFactory;
    protected $table = 'more_than_sixty';

    protected $fillable = [
        'cid',
        'batch',
        'q1',
        's1',
        'q2',
        's2',
        'assignment',
        'end_sem',
    ];
}
