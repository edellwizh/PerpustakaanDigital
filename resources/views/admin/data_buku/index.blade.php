@extends('sidebar.html')

@section('title', 'Data Buku')

@section('content')
<div class="container-fluid">
    <h2 class="judul-h2">Daftar Buku</h2>   
    
    <a href="{{ url('/admin/kategori') }}" class="btn"> Kategori </a>
    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Buku</button>
    
    @include('sidebar.pesan_sukses')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Kategori</th>
                <th scope="col">Nama Penulis</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Stok</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buku as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->kategoriBuku->nama_kategori ?? 'Tanpa Kategori' }}</td>
                <td>{{ $item->penerbit }}</td>
                <td>{{ $item->tahun_penerbit }}</td>
                <td>{{ $item->stok }}</td>
                <td>
                    <button class="btn btn-sm btn-warning btn-edit" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalEdit"
                            data-id="{{ $item->id_buku }}"
                            data-judul="{{ $item->judul }}"
                            data-id_kategori="{{ $item->id_kategori }}"
                            data-penerbit="{{ $item->penerbit }}"
                            data-tahun_penerbit="{{ $item->tahun_penerbit }}"
                            data-stok="{{ $item->stok }}"
                            data-deskripsi="{{ $item->deskripsi }}">
                        Edit
                    </button>   

                    <form action="{{ url('admin/buku/'.$item->id_buku) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus buku ini?')">Hapus</button>
                    </form>                        
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('admin.data_buku.modal_databuku')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.btn-edit').on('click', function() {
        // 1. Ambil data dari tombol yang diklik
        const id = $(this).data('id');
        const judul = $(this).data('judul'); 
        const id_kategori = $(this).data('id_kategori');
        const penerbit = $(this).data('penerbit');
        const tahun_penerbit = $(this).data('tahun_penerbit');
        const stok = $(this).data('stok');
        const deskripsi = $(this).data('deskripsi');

        // 2. Masukkan ke dalam input modal (Populate data sebelumnya)
        $('#edit_judul').val(judul);
        $('#edit_id_kategori').val(id_kategori);
        $('#edit_penerbit').val(penerbit);
        $('#edit_tahun_penerbit').val(tahun_penerbit);
        $('#edit_stok').val(stok);
        $('#edit_deskripsi').val(deskripsi);

        // 3. Ubah action form agar mengarah ke ID buku yang dipilih
        $('#formEdit').attr('action', '{{ url("admin/buku") }}/' + id);
    });
});
</script>
@endsection