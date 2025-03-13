<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'points',
        'badage',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
