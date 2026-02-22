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
                <th>Username</th>
                <th>NIS</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->nis }}</td>
                <td>{{ $user->jurusan }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <button class="btn btn-sm btn-warning btn-edit" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modalEdit"
                        data-id_user="{{ $user->id_user }}" 
                        data-name="{{ $user->name }}"
                        data-email="{{ $user->email }}"
                        data-nis="{{ $user->nis }}"
                        data-jurusan="{{ $user->jurusan }}"
                        data-no_telp="{{ $user->no_telp }}">
                        Edit
                    </button>

                    <form action="{{ url('admin/anggota/'.$user->id_user) }}" method="POST" class="d-inline">
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
        const id_user = $(this).data('id_user'); 
        const name    = $(this).data('name');
        const email   = $(this).data('email');
        const nis     = $(this).data('nis');
        const jurusan = $(this).data('jurusan');
        const no_telp = $(this).data('no_telp');

        // Isi input di dalam modal
        $('#edit_name').val(name);
        $('#edit_email').val(email);
        $('#edit_nis').val(nis);
        $('#edit_jurusan').val(jurusan);
        $('#edit_no_telp').val(no_telp);

        $('#edit_jurusan').val(jurusan).trigger('change');
        
        $('#formEdit').attr('action', '{{ url("admin/anggota") }}/' + id_user);
    });
});
</script>
@endsection