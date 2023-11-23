<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'quesion_id',
        'content',
        'is_corect'
    ];

    public function quesion(){
        return $this->belongsTo(Quesion::class);
    }
}
