
<div class="row mt-4">
    <div class="col-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Edit Penarikan Nasabah</h6>
            </div>
            <div class="card-body p-3">
                <form method="POST" action="<?php echo base_url(); ?>penarikan/update/<?php echo $penarikan->id_penarikan; ?>">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nasabah</label>
                        <select class="select_2_class form-control" name="nasabah" required>
                            <option>-- Pilih Nasabah --</option>
                            <?php
                            print_r($nasabah);
                            foreach ($nasabah as $key => $value) {
                            ?>
                            <option value="<?php echo $value->id_nasabah; ?>" <?php if($value->id_nasabah == $penarikan->id_nasabah) echo "selected" ?> ><?php echo $value->nama; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nominal Penarikan</label>
                        <input class="form-control" type="number" name="nominal" placeholder="20000" value="<?php echo $penarikan->nominal_penarikan; ?>">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tanggal Penarikan</label>
                        <input class="form-control" type="date" name="tanggal_penarikan" value="<?php echo $penarikan->tgl_penarikan; ?>">
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Jenis Tabungan</label>
                        <select class="select_2_class form-control" name="jenis_tabungan" required>
                            <option>-- Pilih Jenis Tabungan --</option>
                            <option value="Si Rela" <?php if($penarikan->jns_tabungan == "Si Rela") echo "selected"; ?>>Si Rela</option>
                            <option value="Si Suka" <?php if($penarikan->jns_tabungan == "Si Suka") echo "selected"; ?>>Si Suka</option>
                            <option value="Si Mapan" <?php if($penarikan->jns_tabungan == "Si Mapan") echo "selected"; ?>>Si Mapan</option>
                            <option value="Simpanan Wadiah" <?php if($penarikan->jns_tabungan == "Simpanan Wadiah") echo "selected"; ?>>Simpanan Wadiah</option>
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