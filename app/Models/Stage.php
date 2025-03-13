<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id',
        'stage_number',
        'previous_stage',
    ];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
