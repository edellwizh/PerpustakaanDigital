@extends('sidebar.html') {{-- Mengambil kerangka utama --}}

@section('title', 'Dashboard')

@section('content')
       <div class="container-fluid">
             <div class="card">
                <div class="card-body">
                    <h4>HI! Selamat Datang  {{ Auth::user()->name }}.</h2>
                    <h6>Semangat Bekerja untuk hari ini.</h6>
                </div>
                </div>

            <div class="isi">
                        
                        <div class="card warna">
                            <div class="card-body">
                                <h4>Total Buku</h4>
                                <h6><i class="bi bi-book"></i> {{ $totalBuku }}</h6>
                            </div>
                        </div>

                        <div class="card warna">
                            <div class="card-body">
                                <h4>Total Anggota</h4>
                                <h6><i class="bi bi-people"></i> {{ $totalAnggota }}</h6>
                            </div>
                        </div>

                        <div class="card warna">
                            <div class="card-body">
                                <h4>Buku Dipinjam</h4>
                                <h6><i class="bi bi-journal-check"></i> {{ $bukuDipinjam }}</h6>
                            </div>
                        </div>
                    </div>
       </div>
    
@endsection
                    