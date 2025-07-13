<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    // عرض صفحة إضافة الاختبارات لكل فيديو داخل القسم
    public function showCategory(Category $category)
    {
        $videos = $category->videos;
        return view('quiz.show', compact('category', 'videos'));
    }

    // حفظ سؤال جديد
    public function store(Request $request)
{
    $request->validate([
        'video_id' => 'required|exists:videos,id',
        'questions' => 'required|array',
    ]);

    foreach ($request->questions as $q) {
        $imagePath = null;

        if (isset($q['image']) && $q['image']->isValid()) {
            $imagePath = $q['image']->store('quiz_images', 'public');
        }

        Quiz::create([
            'video_id' => $request->video_id,
            'question' => $q['question'],
            'option_1' => $q['option_1'],
            'option_2' => $q['option_2'],
            'option_3' => $q['option_3'],
            'correct_answer' => $q['correct_answer'],
            'image' => $imagePath
        ]);
    }

    return redirect()->back()->with('success', 'تم حفظ الأسئلة بنجاح.');
}

    public function create(Video $video)
    {
        return view('quiz.create', compact('video'));
    }
    public function submit(Request $request, Video $video)
    {
        $score = 0;
        $total = $video->quizzes->count();

        foreach ($video->quizzes as $q) {
            if ($request->answers[$q->id] == $q->correct_answer) {
                $score++;
            }
        }

        $passed = $score >= ceil($total * 0.7); // نسبة النجاح 70%
        
        // احفظ نتيجة المستخدم إن أردت

        return back()->with('result', "نتيجتك: $score / $total - " . ($passed ? 'ناجح ✅' : 'راسب ❌'));
    }
    public function show(Video $video)
    {
        $video->load('quizzes');
        return view('videos.show', compact('video'));
    }

}
