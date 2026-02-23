@extends('sidebar.html')

@section('title', 'Buku Saya')

@section('content')
    <div class="container-fluid py-4">
    <div class="card mb-4">
        <div class="card-body">

            <div class="d-flex align-items-center mb-3">
            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; min-width: 50px; font-weight: bold;">
                {{ strtoupper(substr(Auth::user()->nama_anggota, 0, 1)) }}
            </div>
            <div class="ms-3">
                <h5 class="mb-0">{{ Auth::user()->nama_anggota }}</h5>
                <small class="text-muted">{{ Auth::user()->nis }} | {{ Auth::user()->jurusan }} | {{ Auth::user()->kelas }}</small>
            </div>
        </div>
        <p class="mb-0 text-muted fst-italic small">
            "Buku adalah teman yang paling sabar. Selamat membaca hari ini!"
        </p>
    </div>
    </div>

    <h2 class="judul-h2 mb-4">Daftar Buku Saya</h2>   

    @include('sidebar.pesan_sukses')

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjamans as $p)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><strong>{{ $p->buku->judul }}</strong></td>
                        <td>{{ \Carbon\Carbon::parse($p->tgl_pinjam)->format('d M Y') }}</td>
                        <td>
                            {{ $p->tgl_kembali ? \Carbon\Carbon::parse($p->tgl_kembali)->format('d M Y') : '-' }}
                        </td>
                        <td>
                        @if($p->status == 'dipinjam')
                            {{-- Form Kembalikan --}}
                            <form action="{{ url('user/kembali/' . $p->id_pinjam) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Apakah Anda ingin mengembalikan buku ini?')">
                                    Kembalikan Buku
                                </button>
                            </form>
                        @else
                            {{-- Form Hapus Riwayat --}}
                            <form action="{{ url('user/buku-saya/' . $p->id_pinjam) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus riwayat peminjaman ini?')">
                                    Hapus Riwayat
                                </button>
                            </form>
                        @endif
                    </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Anda belum meminjam buku apapun.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection