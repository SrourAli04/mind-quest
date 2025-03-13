<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    //
    use HasFactory;
    protected $fillable = [

        'user_id', 'message', 'sender', 'emotion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
