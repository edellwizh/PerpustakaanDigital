<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Perpustakaan Sekolah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container_css">
        <div class="sidebar_css">
            <div class="header_css">
                <div class="list-item">
                    <a href="#"><span class="judul">Perpustakaan Sekolah</span></a>
                </div>
            </div>

            <div class="main">
                <div class="list-item">
                    <a href="{{ url('/admin/dashboard') }}">
                        <i class="bi bi-grid-fill icon"></i>
                        <span class="judul-navbar">Dashboard</span>
                    </a>
                </div>
            </div>

            <div class="main">
                <div class="list-item">
                    <a href="{{ url('/admin/data-buku') }}">
                        <i class="bi bi-book icon"></i>
                        <span class="judul-navbar">Data Buku</span>
                    </a>
                </div>
            </div>

            <div class="main">
                <div class="list-item">
                    <a href="{{ url('/admin/data-anggota') }}">
                        <i class="bi bi-people icon"></i>
                        <span class="judul-navbar">Data Anggota</span>
                    </a>
                </div>
            </div>

            <hr class="garis">

            <div class="main">
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="list-item btn-logout border-0 w-100 text-start" style="background: none;">
                        <i class="bi bi-box-arrow-right icon text-white"></i>
                        <span class="judul-navbar text-white">Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="main-content py-3">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>