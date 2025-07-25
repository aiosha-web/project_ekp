<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVideoProgress extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}

public function video()
{
    return $this->belongsTo(Video::class);
}

}
