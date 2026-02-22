        <div class="sidebar_css">
            <div class="header_css">
                <div class="list-item">
                    <a href="#"><span class="judul">Perpustakaan Sekolah</span></a>
                </div>
            </div>

            <div class="main">
                <div class="list-item">
                    <a href="{{ url('/user/katalog-buku') }}"><i class="bi bi-grid-fill icon"></i><span class="judul-navbar">Katalog Buku</span></a>
                </div>
            </div>

            <div class="main">
                <div class="list-item">
                    <a href="{{ url('/user/buku-saya') }}"><i class="bi bi-book-half icon"></i><span class="judul-navbar">Buku Saya</span></a>
                </div>
            </div>

            <hr class="garis">

            <div class="main">
                <div class="list-item btn-logout">
                    <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="list-item btn-logout border-0 w-100 text-start" style="background: none;"  onclick="return confirm('Yakin ingin logout?')">
                        <i class="bi bi-box-arrow-right icon text-white"></i>
                        <span class="judul-navbar text-white">Logout</span>
                    </button>
                </form>                
            </div>
            </div>
        </div> 
    