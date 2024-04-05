<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwoDResult extends Model
{
    use HasFactory;
    protected $fillable = ['result', 'two_d_session_id'];

    public function session(){

        return $this->belongsTo(TwoDSession::class, 'two_d_session_id');
    }
}
