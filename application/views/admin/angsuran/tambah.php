
<div class="row mt-4">
    <div class="col-12 mb-lg-0 mb-4">
        <div class="card z-index-2">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Pilih Untuk Pengecekan Angsuran Nasabah</h6>
            </div>
            <div class="card-body p-3">
                <form method="GET" action="<?php echo base_url(); ?>angsuran/tambah">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nasabah</label>
                        <select class="select_2_class col-12 form-control" name="nasabah" required>
                            <option>-- Pilih Nasabah --</option>
                            <?php
                            print_r($nasabah);
                            foreach ($nasabah as $key => $value) {
                            ?>
                            <option value="<?php echo $value->id_nasabah; ?>"><?php echo $value->nama; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">Cari...</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if(isset($angsuranPerPinjaman)) { ?>
    <div class="col-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100 mt-5">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Angsuran</h6>
            </div>
            <div class="card-body p-3">
                <h5>Tagihan Terakhir Belum Terbayarkan</h5>
                <?php
                foreach ($angsuranPerPinjaman as $key => $value) {
                ?>
                <div class="list-group-item border-0 p-3 d-flex bg-gray-300 justify-content-between mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                        <?php if($value['isTelat'] == 1) { ?>
                        <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-exclamation-circle"></i></button>
                        <?php } else { ?>
                        <button class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-hourglass-half"></i></button>
                        <?php } ?>
                        <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">Pinjaman <?php echo date("d/m/Y", strtotime($value['data_pinjaman']->tgl_pinjaman)); ?></h6>
                            <h6 class="mb-1 text-dark text-sm">Angsuran #<?php echo $value['angsuran']; ?></h6>
                            <span class="text-xs"><?php echo date("M Y", strtotime($value['angsuran_bulan'])); ?></span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-primary text-gradient text-sm font-weight-bold">
                        Rp <?php echo number_format($value['nominal_angsuran']); ?>
                    </div>
                </div>
                <?php
                }
                ?>
                <form method="POST" action="<?php echo base_url(); ?>angsuran/store">
                    <input type="hidden" name="nasabah" value="<?php echo $nasabahSelect->id_nasabah; ?>">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Pinjaman</label>
                        <select class="select_2_class col-12 form-control" name="pinjaman" required>
                            <option>-- Pilih Pinjaman --</option>
                            <?php
                            foreach ($pinjamanSelect as $key => $value) {
                            ?>
                            <option value="<?php echo $value->id_pinjaman; ?>">Pinjaman <?php echo date("d/m/Y", strtotime($value->tgl_pinjaman)); ?> - Rp <?php echo number_format($value->nominal_setuju); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nominal Angsuran</label>
                        <input class="form-control" type="number" name="nominal_angsuran" placeholder="20000000" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Terlambat Pembayaran (Hari)</label>
                        <input class="form-control" type="number" name="terlambat_pembayaran" id="input_nominal_disetujui" placeholder="20000000" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Total Yang Harus Dibayar</label>
                        <input class="form-control" type="number" name="total_bayar" id="total_bayar" placeholder="Nominal Angsuran" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Pembayaran Angsuran</label>
                        <input class="form-control" type="date" name="tgl_pembayaran" id="tgl_pembayaran" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tahap Angsuran Ke-</label>
                        <input class="form-control" type="number" name="thp_angsuran" id="thp_angsuran" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Denda</label>
                        <input class="form-control" type="number" name="denda" id="denda" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="clearfix"></div>
