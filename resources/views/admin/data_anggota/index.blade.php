@extends('sidebar.admin') {{-- Mengambil kerangka utama --}}

@section('title', 'Data Anggota')

@section('content')
<div class="container-fluid">
    <h2 class="judul-h2">Daftar Anggota</h2>   

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
            <tr>
                <td>1</td>
                <td>Mark</td>
                <td>12345</td>
                <td>RPL</td>
                <td>mark@gmail.com</td>
                <td>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

{{-- Modal diletakkan di bawah sini --}}
@endsection