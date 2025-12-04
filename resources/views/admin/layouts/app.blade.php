<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Ecocycle')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#4CAF50;">
  <div class="container">

    <!-- LOGO Ecocycle -->
    <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('ecocycle-logo.png') }}" 
             alt="Ecocycle" 
             style="height: 45px;">
    </a>

    <!-- MENU -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.sampah.input') }}">Input Sampah</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.beban.input') }}">Input Beban</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.laparugi') }}">Laba Rugi</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.reward') }}">Reward</a></li>
      </ul>
    </div>

  </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
