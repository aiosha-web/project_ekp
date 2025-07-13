<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class VideoController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('video.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'video_file'  => 'required|file|mimes:mp4,avi,mov,mkv|max:51200',
            'thumbnail'   => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $videoPath = $request->file('video_file')->store('videos', 'public');
        $thumbPath = $request->hasFile('thumbnail')
            ? $request->file('thumbnail')->store('thumbnails', 'public')
            : null;

        Video::create([
            'title'       => $request->title,
            'description' => $request->description,
            'video_path'  => $videoPath,
            'thumbnail'   => $thumbPath,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('category.videos', $request->category_id)
                     ->with('success', 'تمت إضافة الفيديو بنجاح.');
    }
    public function index()
    {
        $videos = Video::with('category')->paginate(10);
        return view('video.index', compact('videos'));

        
    }
    public function destroy(Video $video)
    {
        // حذف ملف الفيديو من التخزين إن وجد
        if ($video->video_path && Storage::exists($video->video_path)) {
            Storage::delete($video->video_path);
        }

        $video->delete();

        return redirect()->back()->with('success', 'تم حذف الفيديو بنجاح');
    }
    public function show(Video $video)
    {
        $video->load('quizzes');
        return view('videos.show', compact('video'));
        UserVideoProgress::updateOrCreate(
        ['user_id' => auth()->id(), 'video_id' => $video->id],
        ['watched' => true]
        );
        UserVideoProgress::where('user_id', auth()->id())
        ->where('video_id', $video->id)
        ->update(['quiz_passed' => true]);
    }

}
