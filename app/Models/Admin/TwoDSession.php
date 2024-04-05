<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwoDSession extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function results()
    {
        return $this->hasMany(TwoDResult::class);
    }
}
