<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectMarks extends Model
{
    use HasFactory;
    protected $table = 'subject_marks';

    protected $fillable = [
        'cid',
        'batch',
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
