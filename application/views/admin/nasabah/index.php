<a href="<?php echo base_url('nasabah/tambah_nasabah') ?>" class="btn bg-gradient-secondary mb-3">Tambah
    Nasabah</a>
<?php echo $this->session->flashdata('pesan') ?>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Nasabah</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        No Telfon</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tempat,Tanggal Lahir
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat Nasabah
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($nasabah as $nas) : ?>
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <p class="mb-0 text-xs">
                                <?php echo $nas->username ?>
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <p class="mb-0 text-xs">
                                <?php echo $nas->nama ?>
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <p class="mb-0 text-xs">
                                <?php echo $nas->tlp_nasabah ?>
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <p class="mb-0 text-xs">
                                <?php echo $nas->tmpt_lhr_nasabah .", "?>
                                <?php echo date('d-m-Y', strtotime($nas->tgl_lhr_nasabah))  ?>
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <p class="mb-0 text-xs">
                                <?php echo $nas->almt_nasabah ?>
                            </p>
                        </div>
                    </td>


                </tr>
                <?php endforeach; ?>



            </tbody>
        </table>
    </div>
</div>