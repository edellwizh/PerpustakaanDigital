<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Perpustakaan Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"></head>
  <body>
    
    <div class="global">
        <div class="card login-form">
            <div class="card-body">
                <h2 class="judul text-center">Perpustakaan Sekolah</h2>
                <h1 class="card-title text-center">L O G I N</h1>
            </div>

            <div class="card-text">
                <form action="{{ url('/login') }}" method="POST">
                @csrf <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>  
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                @include('sidebar.pesan_sukses')

    
                <div class="d-grid gap-2">
                    <button type="submit" class="btn">Login</button>
                </div>

                <p>Belum punya akun? <a href="{{ url('/daftar') }}">Daftar Sekarang</a></p>
            </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>