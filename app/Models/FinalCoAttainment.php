<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalCoAttainment extends Model
{
    use HasFactory;
    protected $table = 'final_co_attainment';
    protected $fillable = ['cid', 'batch', 'total_avg_internal', 'grand_total', 'final_co_attainment'];
}
