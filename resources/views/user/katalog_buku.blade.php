@extends('sidebar.user')

@section('title', 'Katalog Buku')

@section('content')
        <div class="container-fluid">
             <div class="card">
                <div class="card-body">
                    <h4>HI! Selamat Datang Ellena!</h2>
                    <h6>Siswa Kelas XII - Semangat literasi untuk hari ini.</h6>
                </div>
                </div>

                <div class="card-item">

                <div class="card card-warna" style="width: 18rem;">
                <div class="card-body">
                    <h5>Judul Buku</h5>
                    <h6 class="mb-2 text-body-white">Penerbit</h6>
                    <p class="card-text">Ringkasan buku</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Pinjam Buku
                    </button>
                </div>
            </div>

            <div class="card  card-warna" style="width: 18rem;">
                <div class="card-body">
                    <h5>Judul Buku</h5>
                    <h6 class="mb-2 text-body-white">Penerbit</h6>
                    <p class="card-text">Ringkasan buku</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Pinjam Buku
                    </button>
                </div>
            </div>

            <div class="card  card-warna" style="width: 18rem;">
                <div class="card-body">
                    <h5>Judul Buku</h5>
                    <h6 class="mb-2 text-body-white">Penerbit</h6>
                    <p class="card-text">Ringkasan buku</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Pinjam Buku
                    </button>
                </div>
            </div>

            <div class="card  card-warna" style="width: 18rem;">
                <div class="card-body">
                    <h5>Judul Buku</h5>
                    <h6 class="mb-2 text-body-white">Penerbit</h6>
                    <p class="card-text">Ringkasan buku</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Pinjam Buku
                    </button>
                </div>
            </div>

        </div>
    </div>
    </div>
   </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection