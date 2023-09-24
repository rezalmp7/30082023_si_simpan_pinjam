
<div class="row mt-4">
    <div class="col-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100 mt-5">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Angsuran</h6>
            </div>
            <div class="card-body p-3">
                <form method="POST" action="<?php echo base_url(); ?>angsuran/update/<?php echo $angsuran->id_angsuran; ?>">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nominal Angsuran</label>
                        <input class="form-control" type="number" name="nominal_angsuran" placeholder="20000000" value="<?php echo $angsuran->nominal_angsuran; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Terlambat Pembayaran (Hari)</label>
                        <input class="form-control" type="number" name="terlambat_pembayaran" id="input_nominal_disetujui" value="<?php echo $angsuran->terlambat; ?>" placeholder="20000000" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Total Yang Harus Dibayar</label>
                        <input class="form-control" type="number" name="total_bayar" id="total_bayar" placeholder="Nominal Angsuran" value="<?php echo $angsuran->nominal_angsuran; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Pembayaran Angsuran</label>
                        <input class="form-control" type="date" name="tgl_pembayaran" id="tgl_pembayaran" value="<?php echo $angsuran->tgl_angsuran; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tahap Angsuran Ke-</label>
                        <input class="form-control" type="number" name="thp_angsuran" id="thp_angsuran" value="<?php echo $angsuran->tahap_angsuran; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Denda</label>
                        <input class="form-control" type="number" name="denda" id="denda" value="<?php echo $angsuran->denda; ?>" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
