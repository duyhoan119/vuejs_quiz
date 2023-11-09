<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuiz extends Model
{
    use HasFactory;
    public $table = "user_quiz";
    protected $fillable = [
        'user_id',
        'quiz_id',
        'quesion_answered',
        'score'
    ];

    public function quesionAnswer(){
        return $this->hasMany(QuesionAnsered::class);
    }
}
