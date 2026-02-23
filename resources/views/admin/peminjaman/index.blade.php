@extends('sidebar.html')

@section('title', 'Data Transaksi')

@section('content')
<div class="main-content py-3 text-dark">
    <div class="container-fluid">
        <h2 class="judul-h2 mb-4">Daftar Transaksi</h2>   

        @include('sidebar.pesan_sukses')
        
        <table class="table table-striped border">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Peminjaman</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjamans as $p)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    {{-- Mengambil ID langsung dari tabel peminjaman --}}
                    <td>{{ $p->id_pinjam }}</td>
                    <td>{{ $p->user->name ?? $p->user->nama_anggota }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->tgl_pinjam)->translatedFormat('d F Y') }}</td>
                    <td>{{ $p->tgl_kembali ? \Carbon\Carbon::parse($p->tgl_kembali)->translatedFormat('d F Y') : '-' }}</td>
                    <td>
                        @if($p->status == 'dipinjam')
                            <span class="badge bg-warning text-dark">Dipinjam</span>
                        @else
                            <span class="badge bg-success">Dikembalikan</span>
                        @endif
                    </td>
                    <td>
                        {{-- Tombol Lihat Detail tetap muncul tanpa syarat status --}}
                        <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $p->id_pinjam }}">
                            Lihat Detail
                        </button>

                        <form action="{{ url('/admin/peminjaman/' . $p->id_pinjam) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data transaksi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="modalDetail{{ $p->id_pinjam }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Peminjam</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4>{{ $p->user->name ?? $p->user->nama_anggota }}</h4>
                                <hr>
                                <p><strong>Judul Buku:</strong> {{ $p->buku->judul }}</p>
                                {{-- Menampilkan Kategori Buku --}}
                                <p><strong>Kategori:</strong> {{ $p->buku->kategoriBuku->nama_kategori ?? 'Umum' }}</p>
                                <p><strong>NIS:</strong> {{ $p->user->nis }}</p>
                                <p><strong>Jurusan:</strong> {{ $p->user->jurusan }}</p>
                                <p><strong>Kelas:</strong> {{ $p->user->kelas ?? '-' }}</p>
                                <p><strong>Tanggal Pinjam:</strong> {{ \Carbon\Carbon::parse($p->tgl_pinjam)->translatedFormat('l, d F Y') }}</p>
                                <p><strong>Tanggal Kembali:</strong> {{ $p->tgl_kembali ? \Carbon\Carbon::parse($p->tgl_kembali)->translatedFormat('l, d F Y') : '-' }}</p>
                                <p><strong>Status:</strong> 
                                    <span class="badge {{ $p->status == 'dipinjam' ? 'bg-warning text-dark' : 'bg-success' }}">
                                        {{ ucfirst($p->status) }}
                                    </span>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection