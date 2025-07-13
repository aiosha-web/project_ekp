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

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom px-4 py-2">
  <div class="container-fluid d-flex justify-content-between align-items-center">

    <!-- Left: Logo + Nav -->
    <div class="d-flex align-items-center gap-3">
      <div class="me-2">
        <svg width="40" height="40" fill="currentColor" viewBox="0 0 48 48">
          <path d="M8.578 8.578C5.528 11.628 3.451 15.515 2.609 19.745C1.768 23.976 2.2 28.361 3.851 32.346C5.501 36.331 8.297 39.738 11.883 42.134C15.47 44.531 19.686 45.81 24 45.81C28.314 45.81 32.53 44.531 36.117 42.134C39.703 39.738 42.499 36.331 44.149 32.346C45.8 28.361 46.232 23.976 45.391 19.745C44.549 15.515 42.472 11.628 39.422 8.578L24 24 8.578 8.578Z"/>
        </svg>
      </div>
      <span class="fw-bold fs-5">Learn English</span>

      <!-- Navigation -->
      <a href="{{ route('home') }}" class="btn btn-light ms-3"><i class="fas fa-home me-1"></i> Home</a>
      <a href="#" class="btn btn-light ms-3"><i class="fas fa-chart-line me-1"></i> Progress</a>

      <!-- Settings dropdown -->
      <div class="dropdown ms-3">
        <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
          <i class="fas fa-cog me-1"></i> Settings
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href=""><i class="fas fa-video me-2"></i> إضافة فيديو</a></li>
          <li><a class="dropdown-item" href=""><i class="fas fa-list me-2"></i> تعديل الأقسام</a></li>
        </ul>
      </div>
    </div>

    <!-- Right: User dropdown -->
    <div class="dropdown">
      <button class="btn btn-light dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
        <i class="fas fa-user me-1"></i> {{ Auth::user()->first_name ?? 'User' }}
      </button>
      <ul class="dropdown-menu dropdown-menu-end">
        <li class="dropdown-item text-muted">
          <strong>{{ Auth::user()->first_name ?? 'User' }} {{ Auth::user()->last_name ?? '' }}</strong>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-1"></i> Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <h2>{{ $video->title }}</h2>

    <video controls width="100%" onended="showQuiz()">
        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
        متصفحك لا يدعم الفيديو.
    </video>

    <div id="quiz-section" style="display: none;" class="mt-4">
        <h4>الاختبار</h4>
        @if($video->quizzes->count())
            <form method="POST" action="{{ route('quiz.submit', $video->id) }}">
                @csrf
                @foreach($video->quizzes as $q)
                    <div class="mb-3">
                        <strong>{{ $q->question }}</strong><br>
                        <label><input type="radio" name="answers[{{ $q->id }}]" value="1" required> {{ $q->option_1 }}</label><br>
                        <label><input type="radio" name="answers[{{ $q->id }}]" value="2"> {{ $q->option_2 }}</label><br>
                        <label><input type="radio" name="answers[{{ $q->id }}]" value="3"> {{ $q->option_3 }}</label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">إرسال الإجابات</button>
            </form>
        @else
            <div class="alert alert-info">لا توجد أسئلة مرتبطة بهذا الفيديو.</div>
        @endif
    </div>
</div>

<script>
function showQuiz() {
    document.getElementById('quiz-section').style.display = 'block';
}
</script>
</body>
</html>
