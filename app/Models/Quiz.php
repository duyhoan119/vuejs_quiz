<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
