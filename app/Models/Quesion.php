<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quesion extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'content',
        'point'
    ];

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
