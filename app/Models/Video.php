<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected $fillable = [
        'title',
        'description',
        'video_path',
        'thumbnail',
        'category_id',
    ];
    public function quizzes()
{
    return $this->hasMany(Quiz::class);
}

    public function quizResults()
    {
        return $this->hasMany(UserQuizResult::class);
    }
    public function videoProgresses()
{
    return $this->hasMany(UserVideoProgress::class);
}


}
