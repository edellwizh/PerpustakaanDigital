<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar | Perpustakaan Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"></head>
</head>
  <body>
    
    <div class="global">
        <div class="card login-form">
            <div class="card-body">
                <h2 class="judul text-center">Perpustakaan Sekolah</h2>
                <h1 class="card-title text-center">D A F T A R</h1>
            </div>
            <div class="card-text">

                <form action="{{ url('/daftar') }}" method="POST">
                @csrf <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="name" class="form-control" name="nama_anggota" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="number" class="form-control" name="nis" required>
                </div>

                <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select" name="jurusan" required>
                    <option selected>Pilih Jurusan</option>
                    <option value="tr">Transmisi</option>
                    <option value="tja">Teknik Jaringan Akses</option>
                    <option value="tkj">Teknik Komputer Jaringan</option>
                    <option value="rpl">Rekayasa Perangkat Lunak</option>
                    </select>
                </div>

                <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select" name="kelas" required>
                    <option selected>Pilih Kelas</option>
                    <option value="x">x</option>
                    <option value="xi">xi</option>
                    <option value="xii">xii</option>
                    </select>
                </div>
                
                @include('sidebar.pesan_sukses')

                <div class="d-grid gap-2">
                    <button type="submit" class="btn">Daftar</button>
                </div>

                <p>Sudah punya akun? <a href="{{ url('/login') }}">Login Sekarang</a></p>   
            </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>