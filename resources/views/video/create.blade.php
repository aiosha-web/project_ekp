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
<div class="container py-4">
        <h2 class="fw-bold mb-4">إضافة فيديو جديد</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- عنوان الفيديو -->
            <div class="mb-3">
                <label for="title" class="form-label">عنوان الفيديو</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>UY
            <!-- وصف الفيديو -->
            <div class="mb-3">
                <label for="description" class="form-label">وصف الفيديو</label>
                <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
            </div>

            <!-- رفع الفيديو -->
            <div class="mb-3">
                <label for="video_file" class="form-label">تحميل ملف الفيديو</label>
                <input type="file" name="video_file" class="form-control" id="video_file" accept="video/*" required>
            </div>

            <!-- صورة مصغرة اختيارية -->
            <div class="mb-3">
                <label for="thumbnail" class="form-label">صورة مصغرة (اختياري)</label>
                <input type="file" name="thumbnail" class="form-control" id="thumbnail" accept="image/*">
            </div>

            <!-- القسم -->
            <div class="mb-3">
                <label for="category_id" class="form-label">القسم</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="" disabled selected>اختر القسم</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- زر الحفظ -->
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> حفظ الفيديو
            </button>
        </form>
    </div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
