@extends('sidebar.user')

@section('title', 'Buku Saya')

@section('content')
<div class="container-fluid">
    <h2 class="judul-h2">Daftar Buku Saya</h2>   

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Buku</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Durasi Hari</th>
                <th scope="col">Denda</th>
                <th scope="col">Status Denda</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Judul Buku Contoh</td>
                <td>2024-05-20</td>
                <td>7 Hari</td>
                <td>Rp 0</td>
                <td>
                    <button type="button" class="btn btn-sm" onclick="return confirm('Silahkan lakukan pembayaran denda ke perpustakaan')">Detail Pembayaran</button>
                </td>
                <td>
                    <button type="button" class="btn btn-sm" onclick="return confirm('Yakin ingin mengembalikan buku?')">Kembalikan</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection