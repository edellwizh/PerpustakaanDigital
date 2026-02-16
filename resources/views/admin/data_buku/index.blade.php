@extends('sidebar.html') {{-- Mengambil kerangka utama --}}

@section('title', 'Data Buku')

@section('content')
        <div class="container-fluid">
          <h2 class="judul-h2">Daftar Buku</h2>   
          
          <a href="{{ url('/admin/kategori') }}" class="btn"> Kategori </a>
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Buku</button>
           
          <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Kategori</th>
                <th scope="col">stok</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>
                    <button type="button" class="btn" onclick="return confirm('Yakin ingin hapus buku?')" >Hapus</button>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                </td>
                </tr>
            
            </tbody>
            </table>
        </div>
{{-- Modal diletakkan di bawah sini --}}
@endsection
    