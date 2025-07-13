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
    <div class="d-flex align-items-center gap-3">
      <span class="fw-bold fs-5">Learn English</span>
      <a href="{{ route('home') }}" class="btn btn-light ms-3"><i class="fas fa-home me-1"></i> Home</a>
      <a href="#" class="btn btn-light ms-3"><i class="fas fa-chart-line me-1"></i> Progress</a>
      
      <div class="dropdown ms-3">
        <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
          <i class="fas fa-cog me-1"></i> Settings
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('video.create') }}"><i class="fas fa-video me-2"></i> إضافة فيديو</a></li>
          <li><a class="dropdown-item" href="#"><i class="fas fa-list me-2"></i> تعديل الأقسام</a></li>
        </ul>
      </div>
    </div>

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

<div class="container py-4">
  <h2 class="fw-semibold mb-3">{{ $category->name }}</h2>
  @if(Auth::user()->isAdmin())
  <a href="{{ route('video.create') }}" class="btn btn-success mb-4">
    <i class="fas fa-plus"></i> إضافة فيديو
  </a>
  @if($category->videos->count())
    <div class="row">
      @foreach($category->videos as $video)
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <video controls width="100%">
              <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
              متصفحك لا يدعم تشغيل الفيديو.
            </video>
            <div class="card-body">
              <h5 class="card-title">{{ $video->title }}</h5>
              <p class="card-text">{{ $video->description }}</p>

              <!-- زر إضافة اختبار -->
              <a href="{{ route('quiz.create', $video->id) }}" class="btn btn-warning mb-2">
                <i class="fas fa-question-circle me-1"></i> أضف اختبار
              </a>

              <!-- زر مشاهدة الفيديو إذا اجتاز المستخدم الاختبار -->
              @if($video->quizResults()->where('user_id', auth()->id())->where('passed', true)->exists())
                <a href="{{ route('videos.show', $video->id) }}" class="btn btn-success mb-2">
                  <i class="fas fa-play-circle me-1"></i> شاهد الفيديو
                </a>
              @endif

              <!-- زر حذف الفيديو -->
              <form action="{{ route('video.destroy', $video->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف الفيديو؟')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="fas fa-trash-alt"></i> حذف
                </button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    @endif
  @else
    <p>لا توجد فيديوهات في هذا القسم بعد.</p>
  @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
