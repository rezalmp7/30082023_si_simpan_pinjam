
<div class="row mt-4">
    <div class="col-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize d-inline">Data Pinjaman Nasabah</h6>
                <?php if($this->session->userdata('level') == 'teller') { ?>
                <a href="<?php echo base_url(); ?>pinjaman/tambah" class="btn btn-success btn-sm float-end">Tambah</a>
                <?php } ?>
            </div>
            <div class="card-body p-3">
                <table class="table table-lg datatables" style="width:100%; font-size: 13px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nasabah</th>
                            <th>Nominal</th>
                            <th>Tanggal Pinjaman</th>
                            <th>Jangka Angsuran</th>
                            <?php if($this->session->userdata('level') == 'teller') { ?>
                            <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pinjaman as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value->nama_nasabah; ?></td>
                            <td>Rp <?php echo number_format($value->nominal_setuju); ?></td>
                            <td><?php echo date("d/m/Y", strtotime($value->tgl_pinjaman)); ?></td>
                            <td><?php echo $value->jangka_pinjaman; ?> Tahun</td>
                            <?php if($this->session->userdata('level') == 'teller') { ?>
                            <td>
                                <div class="dropdown">
                                    <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </span>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>pinjaman/info/<?php echo $value->id_pinjaman; ?>">Info</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>pinjaman/edit/<?php echo $value->id_pinjaman; ?>">Edit</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>pinjaman/hapus/<?php echo $value->id_pinjaman; ?>" onclick="return confirm('Yakin Hapus Pinjaman Ini?')">Hapus</a></li>
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