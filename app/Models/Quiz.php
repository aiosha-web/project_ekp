<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
        protected $fillable = [
        'video_id', 'question', 'option_1', 'option_2', 'option_3', 'correct_answer', 'image'
    ];
    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
