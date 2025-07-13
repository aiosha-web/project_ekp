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
      <a href="{{ route('user.progress') }}" class="btn btn-light ms-3"><i class="fas fa-chart-line me-1"></i> Progress</a>

      <!-- Settings dropdown -->
      <div class="dropdown ms-3">
        <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
          <i class="fas fa-cog me-1"></i> Settings
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('video.create') }}"><i class="fas fa-video me-2"></i> إضافة فيديو</a></li>
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

<!-- Main content -->
<main class="container py-4">
  <h2 class="fw-bold mb-4">Explore our lessons</h2>

  <!-- Essential English -->
  <section class="mb-5">
    <h4 class="fw-semibold mb-3">Essential English</h4>
    <div class="row g-3">
      <div class="col-12 col-md-6 col-lg-4">
        <a href="{{ route('category.videos', 1) }}">
          <div class="card">
            <img src="https://cdn.usegalileo.ai/sdxl10/f7334e34-344d-42ec-8696-7f7defd3e2dc.png" class="card-img-top" alt="ABCs">
            <div class="card-body text-center"><p class="fw-medium">ABCs</p></div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <a href="">
          <div class="card">
            <img src="https://cdn.usegalileo.ai/sdxl10/b3a3ca8b-c198-444e-8c13-7a39c37b6f24.png" class="card-img-top" alt="Numbers">
            <div class="card-body text-center"><p class="fw-medium">Numbers</p></div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <a href="">
          <div class="card">
            <img src="https://cdn.usegalileo.ai/sdxl10/f8da77e1-9cb2-4d65-96db-992263e8562f.png" class="card-img-top" alt="Body Parts">
            <div class="card-body text-center"><p class="fw-medium">Body Parts</p></div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- Just for Fun -->
  <section class="mb-5">
    <h4 class="fw-semibold mb-3">Just for Fun</h4>
    <div class="row g-3">
      <div class="col-12 col-md-6 col-lg-4">
        <a href="">
          <div class="card">
            <img src="https://cdn.usegalileo.ai/sdxl10/4d36776d-a8e5-4f1d-ae47-6382d27321ea.png" class="card-img-top" alt="Colors">
            <div class="card-body text-center"><p class="fw-medium">Colors</p></div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <a href="">
          <div class="card">
            <img src="https://cdn.usegalileo.ai/sdxl10/2552c218-5e8c-4367-9b95-31f62b1c8eaa.png" class="card-img-top" alt="Fruits">
            <div class="card-body text-center"><p class="fw-medium">Fruits</p></div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <a href="">
          <div class="card">
            <img src="https://cdn.usegalileo.ai/sdxl10/3c515771-5187-4015-b17d-9024271db6d1.png" class="card-img-top" alt="Animals">
            <div class="card-body text-center"><p class="fw-medium">Animals</p></div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- Life Skills -->
  <section>
    <h4 class="fw-semibold mb-3">Life Skills</h4>
    <div class="row g-3">
      <div class="col-12 col-md-6 col-lg-4">
        <a href="">
          <div class="card">
            <img src="https://cdn.usegalileo.ai/sdxl10/71a9a7aa-36f4-4268-910f-e07a22a0d247.png" class="card-img-top" alt="Days of the Week">
            <div class="card-body text-center"><p class="fw-medium">Days of the Week</p></div>
          </div>
        </a>
      </div>
    </div>
  </section>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>