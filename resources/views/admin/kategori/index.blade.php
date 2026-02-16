@extends('sidebar.html') {{-- Mengambil kerangka utama --}}

@section('title', 'Kategori')

@section('content')
    <!-- Data Kategori -->
       
        <div class="container-fluid">
          <h2 class="judul-h2">Daftar Kategori</h2>   
          
          <a href="{{ url('/admin/buku') }}" class="btn"> Lihat buku </a>
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Kategori</button>           
          
          @include('sidebar.pesan_sukses')

          <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori as $item)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_kategori }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>

                    <button class="btn btn-sm btn-warning btn-edit" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalEdit"
                            data-id="{{ $item->id_kategori }}"
                            data-nama="{{ $item->nama_kategori }}"
                            data-deskripsi="{{ $item->deskripsi }}">
                        Edit
                    </button>                   
                    
                    <form action="{{ url('admin/kategori/'.$item->id_kategori) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                    </form>                
                </td>
                </tr>
            @endforeach
            </tbody>
            </table>
            </div>

            <!-- MODAL -->
@include('admin.kategori.modal_kategori')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    $('.btn-edit').on('click', function() {
        // 1. Ambil data dari atribut 'data-' tombol yang diklik
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        const deskripsi = $(this).data('deskripsi');

        // 2. Masukkan data ke dalam input modal (biar pas dibuka ada isinya)
        $('#edit_nama').val(nama);
        $('#edit_deskripsi').val(deskripsi);

        // 3. Ubah action form agar mengarah ke ID yang benar untuk update
        $('#formEdit').attr('action', '{{ url("admin/kategori") }}/' + id);
    });
});
</script>
@endsection
