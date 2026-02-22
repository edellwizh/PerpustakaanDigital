@extends('sidebar.html')

@section('title', 'Katalog Buku')

@section('content')
<div class="container-fluid py-4">
    <div class="card mb-4">
        <div class="card-body">
            <h4>HI! Selamat Datang {{ Auth::user()->name }}!</h4>
            <h6>Siswa jurusan {{ Auth::user()->jurusan }} - Semangat literasi untuk hari ini.</h6>
        </div>
    </div>

    @include('sidebar.pesan_sukses')
    
    <div class="row">
        @foreach($bukus as $b)
        <div class="col-md-3 mb-4">
            <div class="card card-warna h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $b->judul }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $b->penerbit }}</h6>
                    <p class="card-text text-truncate">{{ $b->deskripsi ?? 'Tidak ada ringkasan.' }}</p>
                    <p class="mt-auto">Stok: <strong>{{ $b->stok }}</strong></p>
                    
                    <button type="button" class="btn btn-info w-100 mt-2" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $b->id_buku }}">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>

<!-- MODAL -->
        <div class="modal fade" id="modalDetail{{ $b->id_buku }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>{{ $b->judul }}</h4>
                        <hr>
                        <p><strong>Penerbit:</strong> {{ $b->penerbit }}</p>
                        <p><strong>Kategori:</strong> {{ $b->kategoriBuku->nama_kategori ?? '-' }}</p>
                        <p><strong>Ringkasan:</strong></p>
                        <p>{{ $b->deskripsi ?? 'Belum ada deskripsi untuk buku ini.' }}</p>
                        <p><strong>Sisa Stok:</strong> {{ $b->stok }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        
                        @if($b->stok > 0)
                            <form action="{{ url('user/pinjam') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_buku" value="{{ $b->id_buku }}">
                                <button type="submit" class="btn btn-primary">Konfirmasi Pinjam Buku</button>
                            </form>
                        @else
                            <button class="btn btn-danger" disabled>Stok Habis</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- END -->
@endsection