@include('sidebar.admin')

<!-- Daftar Anggota -->
        </div>
        <div class="main-content py-3">

       
        <div class="container-fluid">
          <h2 class="judul-h2">Daftar Transaksi</h2>   

          <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>+
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Deadline</th>
                <th scope="col">Status</th>
                <th scope="col">Denda</th>
                <th scope="col">Status Denda</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>
                    <button type="button" class="btn" onclick="return confirm('Yakin benar sudah menerima uang denda?')" >Sudah Bayar</button>
                </td>
                </tr>
            </tbody>
            </table>

        </div>
   </div>   
</div>