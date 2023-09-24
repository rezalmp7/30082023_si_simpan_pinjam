
<div class="row mt-4">
    <div class="col-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Edit Laporan</h6>
            </div>
            <div class="card-body p-3">
                <form method="POST" action="<?php echo base_url(); ?>laporan/update/<?php echo $laporan->id_laporan; ?>">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Laporan</label>
                        <input class="form-control" type="date" name="tanggal_laporan" value="<?php echo $laporan->tgl_laporan; ?>">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jumlah Angsuran Per Hari</label>
                        <input class="form-control" type="number" name="angsuran" placeholder="20000" value="<?php echo $laporan->jml_angsuran; ?>">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jumlah Tabungan Per Hari</label>
                        <input class="form-control" type="number" name="tabungan" placeholder="20000" value="<?php echo $laporan->jml_tabungan; ?>">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jumlah Pinjaman Per Hari</label>
                        <input class="form-control" type="number" name="pinjaman" placeholder="20000" value="<?php echo $laporan->jml_pinjaman; ?>">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Biaya Lain</label>
                        <input class="form-control" type="number" name="biaya_lain" placeholder="20000" value="<?php echo $laporan->biaya_lain; ?>">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jumlah Pemasukan Per Hari</label>
                        <input class="form-control" type="number" name="pemasukan" placeholder="20000" value="<?php echo $laporan->pemasukan; ?>">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jumlah Pengeluaran Per Hari</label>
                        <input class="form-control" type="number" name="pengeluaran" placeholder="20000" value="<?php echo $laporan->pengeluaran; ?>">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jumlah Pendapatan Per Hari</label>
                        <input class="form-control" type="number" name="pendapatan" placeholder="20000" value="<?php echo $laporan->total_pendapatan; ?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>