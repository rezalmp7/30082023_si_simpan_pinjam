
<div class="row mt-4">
    <div class="col-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize d-inline">Data Angsuran Nasabah</h6>
                <a href="<?php echo base_url(); ?>angsuran/tambah" class="btn btn-success btn-sm float-end">Tambah</a>
            </div>
            <div class="card-body p-3">
                <table class="table table-lg datatables" style="width:100%; font-size: 13px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nasabah</th>
                            <th>Nominal</th>
                            <th>Tanggal Angsuran</th>
                            <th>Jangka Angsuran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($angsuran as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $value->nama_nasabah; ?></td>
                            <td>Rp <?php echo number_format($value->nominal_setuju); ?></td>
                            <td><?php echo date("d/m/Y", strtotime($value->tgl_angsuran)); ?></td>
                            <td><?php echo $value->jangka_angsuran; ?> Tahun</td>
                            <td>
                                <div class="dropdown">
                                    <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </span>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>angsuran/info/<?php echo $value->id_angsuran; ?>">Info</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>angsuran/edit/<?php echo $value->id_angsuran; ?>">Edit</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>angsuran/hapus/<?php echo $value->id_angsuran; ?>" onclick="return confirm('Yakin Hapus Pinjaman Ini?')">Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
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