<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultList extends Model
{
    use HasFactory;
    protected $fillable = [
        'am_11',
        'pm_1',
        'pm_3',
        'pm_5',
        'pm_7',
        'pm_9',
    ];
}