<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'points'
    ];

    public function users(){
        return $this->belongsToMany(User::class,'user_tasks')->withTimestamps();
    }
}
