@extends('sidebar.html')

@section('title', 'Data Anggota')

@section('content')
<div class="container-fluid">
    <h2 class="judul-h2">Daftar Anggota</h2>   

    @include('sidebar.pesan_sukses')

    <table class="table mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Anggota</th>
                <th>Nama Anggota</th>
                <th>NIS</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->user_id }}</td>
                <td>{{ $user->nama_anggota }}</td>
                <td>{{ $user->nis }}</td>
                <td>{{ $user->jurusan }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->kelas }}</td>
                <td>
                    <button class="btn btn-sm btn-warning btn-edit" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modalEdit"
                        data-user_id="{{ $user->user_id }}" 
                        data-nama_anggota="{{ $user->nama_anggota }}"
                        data-email="{{ $user->email }}"
                        data-nis="{{ $user->nis }}"
                        data-jurusan="{{ $user->jurusan }}"
                        data-kelas="{{ $user->kelas }}">
                        Edit
                    </button>

                    <form action="{{ url('admin/anggota/'.$user->user_id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus anggota ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('admin.data_anggota.modal_dataanggota')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.btn-edit').on('click', function() {
        // Ambil data dari tombol
        const user_id = $(this).data('user_id'); 
        const nama_anggota    = $(this).data('nama_anggota');
        const email   = $(this).data('email');
        const nis     = $(this).data('nis');
        const jurusan = $(this).data('jurusan');
        const kelas = $(this).data('kelas');

        // Isi input di dalam modal
        $('#edit_nama_anggota').val(nama_anggota);
        $('#edit_email').val(email);
        $('#edit_nis').val(nis);
        $('#edit_jurusan').val(jurusan);
        $('#edit_kelas').val(kelas);

        $('#edit_jurusan').val(jurusan).trigger('change');
        
        $('#formEdit').attr('action', '{{ url("admin/anggota") }}/' + user_id);
    });
});
</script>
@endsection