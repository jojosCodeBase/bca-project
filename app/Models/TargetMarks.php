<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetMarks extends Model
{
    use HasFactory;
    protected $table = 'target_marks';
    protected $fillable = ['cid', 'batch', 'q1', 's1', 'q2', 's2', 'assignment', 'total'];
}
