<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedSubject extends Model
{
    use HasFactory;
    protected $table = 'assigned_subjects';
    protected $fillable = ['cid', 'faculty_id'];
}
