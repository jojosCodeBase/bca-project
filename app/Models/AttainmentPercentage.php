<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttainmentPercentage extends Model
{
    use HasFactory;
    protected $table = 'attainment_percentage';

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
