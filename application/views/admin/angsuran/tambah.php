
<div class="row mt-4">
    <div class="col-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Pilih Untuk Pengecekan Angsuran Nasabah</h6>
            </div>
            <div class="card-body p-3">
                <form method="GET" action="<?php echo base_url(); ?>angsuran/tambah">
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
                        <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
