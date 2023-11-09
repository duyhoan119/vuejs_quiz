<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public $table = 'quizs';
    protected $fillable = [
        'name',
        'subject_id',
    ];

    public function quesion()  {
        return $this->hasMany(Quesion::class);
    }
}
