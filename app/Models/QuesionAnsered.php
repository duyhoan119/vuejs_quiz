<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuesionAnsered extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_quiz_id',
        'quesion_id',
        'answer_id'
    ];
}
