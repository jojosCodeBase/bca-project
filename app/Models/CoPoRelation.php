<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoPoRelation extends Model
{
    use HasFactory;
    protected $table = "co_po_relation";
    protected $fillable = [
        'mapping_id',
        'batch',
        'cid',
        'co',
        'po',
    ];
}
