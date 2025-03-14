<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    //
    use HasFactory;
    protected $fillable = [

        'user_id','status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function stage()
    {
        return $this->hasMany(Stage::class);
    }

}
