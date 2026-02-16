@extends('sidebar.admin') {{-- Mengambil kerangka utama --}}

@section('title', 'Kategori')

@section('content')
    <!-- Data Kategori -->
       
        <div class="container-fluid">
          <h2 class="judul-h2">Daftar Kategori</h2>   
          
          <button type="button" class="btn">Lihat Buku</button>
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Kategori</button>
           
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
                <tr>
                <th scope="row">1</th>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <button type="button" class="btn" onclick="return confirm('Yakin ingin hapus kategori?')" >Hapus</button>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                </td>
                </tr>
            
            </tbody>
            </table>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>

            </div>
        </div>
@endsection
