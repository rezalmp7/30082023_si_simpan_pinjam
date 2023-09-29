
<div class="row mt-4">
    <div class="col-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize d-inline">Data Penarikan Nasabah</h6>
                <?php if($this->session->userdata('level') != 'nasabah') { ?>
                <a href="<?php echo base_url(); ?>/penarikan/tambah" class="btn btn-success btn-sm float-end">Tambah</a>
                <?php } ?>
            </div>
            <div class="card-body p-3">
                <table class="table table-lg datatables" style="width:100%; font-size: 13px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nasabah</th>
                            <th>Nominal</th>
                            <th>Tanggal Penarikan</th>
                            <th>Jenis Tabungan</th>
                            <?php if($this->session->userdata('level') != 'nasabah') { ?>
                            <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($penarikan as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value->nama_nasabah; ?></td>
                            <td><?php echo number_format($value->nominal_penarikan); ?></td>
                            <td><?php echo date("d/m/Y", strtotime($value->tgl_penarikan)); ?></td>
                            <td><?php echo $value->jns_tabungan; ?></td>
                            <?php if($this->session->userdata('level') != 'nasabah') { ?>
                            <td>
                                <div class="dropdown">
                                    <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </span>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>penarikan/edit/<?php echo $value->id_penarikan; ?>">Edit</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>penarikan/hapus/<?php echo $value->id_penarikan; ?>" onclick="return confirm('Yakin Hapus Penarikan Ini?')">Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                            <?php } ?>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>