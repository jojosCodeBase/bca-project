<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoPoRelation extends Model
{
    use HasFactory;
    protected $table = "co_po_relation";
    protected $fillable = [
        'batch',
        'cid',
        'CO',
        'PO1',
        'PO2',
        'PO3',
        'PO4',
        'PO5',
        'PO6',
        'PO7',
        'PO8',
        'PO9',
        'PO10',
        'PO11',
        'PO12',
    ];
}
