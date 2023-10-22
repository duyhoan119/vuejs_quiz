<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'is_corect',
        'score'
    ];

    public function quesionAnswer(){
        return $this->hasMany(QuesionAnsered::class);
    }
}
