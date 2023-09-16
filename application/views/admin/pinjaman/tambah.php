
<div class="row mt-4">
    <div class="col-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Tambah Pinajaman Nasabah</h6>
            </div>
            <div class="card-body p-3">
                <form method="POST" action="<?php echo base_url(); ?>pinjaman/store" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nasabah</label>
                        <select class="select_2_class form-control" name="nasabah" required>
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
                        <label for="example-text-input" class="form-control-label">Jangka Pinjaman(Bulan)</label>
                        <input class="form-control" type="number" name="jangka_pinjaman" onkeyup="onChangeNominalAngsuran()" id="input_jangka_pinjaman" placeholder="12">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Bunga Pinjaman(%)</label>
                        <input class="form-control" type="number" name="bunga_pinjaman" placeholder="12" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Foto Nasabah</label>
                        <input class="form-control" type="file" name="foto" placeholder="Foto Nasabah" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Pinjaman</label>
                        <input class="form-control" type="date" name="tgl_pinjaman" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nominal Pengajuan Pinjaman</label>
                        <input class="form-control" type="number" name="nominal_pinjaman" placeholder="20000000" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Pinjaman Yang Disetujui</label>
                        <input class="form-control" type="number" name="nominal_disetujui" onkeyup="onChangeNominalAngsuran()" id="input_nominal_disetujui" placeholder="20000000" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nominal Angsuran</label>
                        <input class="form-control" type="number" name="nominal_angsuran" id="input_nominal_angsuran" placeholder="Nominal Angsuran" readonly>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function onChangeNominalAngsuran() {
        let input_jangka_pinjaman = document.getElementById("input_jangka_pinjaman").value;
        let input_nominal_disetujui = document.getElementById("input_nominal_disetujui").value;

        let jangka_pinjaman = input_jangka_pinjaman ? input_jangka_pinjaman : 0;
        let nominal_disetujui = input_nominal_disetujui ? input_nominal_disetujui : 0;

        let berapakali_angsuran = jangka_pinjaman;
        let nominal_angsuran = nominal_disetujui / berapakali_angsuran;

        console.log("jangka_pinjaman", jangka_pinjaman);
        console.log("nominal_disetujui", nominal_disetujui);
        console.log("berapakali_angsuran", berapakali_angsuran);
        console.log("nominal_angsuran", nominal_angsuran);

        document.getElementById("input_nominal_angsuran").value = nominal_angsuran;
    }
</script>