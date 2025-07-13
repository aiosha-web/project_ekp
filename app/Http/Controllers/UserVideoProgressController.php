<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserVideoProgress;

class UserVideoProgressController extends Controller
{
    // عرض تقدم المستخدم في الفيديوهات
    public function index()
    {
        $progresses = UserVideoProgress::where('user_id', auth()->id())
            ->with('video')
            ->get();

        return view('user.progress', compact('progresses'));
    }
}
