<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <form id="formEdit" method="POST" class="modal-content">
            @csrf 
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" id="edit_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" id="edit_email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>NIS</label>
                    <input type="text" name="nis" id="edit_nis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <select class="form-select" name="jurusan" id="edit_jurusan" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="tr">Transmisi</option>
                        <option value="tja">Teknik Jaringan Akses</option>
                        <option value="tkj">Teknik Komputer Jaringan</option>
                        <option value="rpl">Rekayasa Perangkat Lunak</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>No Telp</label>
                    <input type="number" name="no_telp" id="edit_no_telp" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
</div>