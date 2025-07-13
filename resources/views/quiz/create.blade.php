<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>EKP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>
<body style="font-family: 'Plus Jakarta Sans', 'Noto Sans', sans-serif;">

<!-- Header (كما هو بدون تغيير) -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom px-4 py-2">
  <!-- ... محتوى الهيدر ... -->
</nav>

<div class="container my-5">
    <h3>إضافة اختبار للفيديو: {{ $video->title }}</h3>

    <form action="{{ route('quiz.store') }}" method="POST">
        @csrf
        <!-- تمرير video_id مع الطلب -->
        <input type="hidden" name="video_id" value="{{ $video->id }}">

        <div id="questions-wrapper">
            <div class="question-block mb-4">
                <h5>سؤال 1</h5>
                <input name="questions[0][question]" class="form-control mb-2" placeholder="نص السؤال" required>
                <input name="questions[0][option_1]" class="form-control mb-2" placeholder="الخيار الأول" required>
                <input name="questions[0][option_2]" class="form-control mb-2" placeholder="الخيار الثاني" required>
                <input name="questions[0][option_3]" class="form-control mb-2" placeholder="الخيار الثالث" required>
                <select name="questions[0][correct_answer]" class="form-select mb-3" required>
                    <option value="1">الخيار الأول</option>
                    <option value="2">الخيار الثاني</option>
                    <option value="3">الخيار الثالث</option>
                </select>
                <hr>
            </div>
        </div>

        <button type="button" id="add-question" class="btn btn-secondary mb-3">إضافة سؤال آخر</button>
        <button type="submit" class="btn btn-success">حفظ كل الأسئلة</button>
    </form>
</div>

<!-- ✅ عرض الاختبار بعد نهاية الفيديو -->
<div class="container my-4">
    <h5 class="mb-3">مشاهدة الفيديو</h5>
    <video controls width="100%" onended="showQuiz()">
        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
        متصفحك لا يدعم تشغيل الفيديو.
    </video>

    <!-- اختبار يظهر بعد انتهاء الفيديو -->
    <div id="quiz-section" class="mt-4" style="display: none;">
        <h4>الاختبار الخاص بهذا الفيديو:</h4>
        <a href="{{ route('quiz.take', $video->id) }}" class="btn btn-primary">بدء الاختبار</a>
    </div>
</div>

<script>
let questionCount = 1;
document.getElementById('add-question').addEventListener('click', function () {
    const wrapper = document.getElementById('questions-wrapper');
    const block = document.createElement('div');
    block.classList.add('question-block', 'mb-4');
    block.innerHTML = `
        <h5>سؤال ${questionCount + 1}</h5>
        <input name="questions[${questionCount}][question]" class="form-control mb-2" placeholder="نص السؤال" required>
        <input name="questions[${questionCount}][option_1]" class="form-control mb-2" placeholder="الخيار الأول" required>
        <input name="questions[${questionCount}][option_2]" class="form-control mb-2" placeholder="الخيار الثاني" required>
        <input name="questions[${questionCount}][option_3]" class="form-control mb-2" placeholder="الخيار الثالث" required>
        <select name="questions[${questionCount}][correct_answer]" class="form-select mb-3" required>
            <option value="1">الخيار الأول</option>
            <option value="2">الخيار الثاني</option>
            <option value="3">الخيار الثالث</option>
        </select>
        <hr>
    `;
    wrapper.appendChild(block);
    questionCount++;
});

// عرض قسم الاختبار بعد انتهاء الفيديو
function showQuiz() {
    document.getElementById('quiz-section').style.display = 'block';
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
