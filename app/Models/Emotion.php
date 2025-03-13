<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'emotion',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
