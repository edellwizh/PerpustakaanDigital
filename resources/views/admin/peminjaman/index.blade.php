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
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Jurusan</th>
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
                    <td>{{ $p->user->name }}</td>
                    <td>{{ $p->buku->judul }}</td>
                    <td>{{ $p->user->nis }}</td>
                    <td>{{ $p->user->jurusan }}</td>
                    <td>{{ $p->tgl_pinjam }}</td>
                    <td>{{ $p->tgl_kembali ?? '-' }}</td>
                    <td>
                        @if($p->status == 'dipinjam')
                            <span class="badge bg-warning text-dark">Dipinjam</span>
                        @else
                            <span class="badge bg-success">Dikembalikan</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ url('/admin/peminjaman/' . $p->id_pinjam) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data transaksi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection