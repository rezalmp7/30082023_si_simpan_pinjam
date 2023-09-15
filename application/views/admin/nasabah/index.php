<div class="col-12 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize d-inline">Data Nasabah</h6>
            <a href="<?php echo base_url('nasabah/tambah_nasabah') ?>"
                class="btn btn-success btn-sm float-end">Tambah</a>
        </div>
        <div class="card-body p-3">
            <?php echo $this->session->flashdata('pesan') ?>
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                    Nasabah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No Telfon</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tempat,Tanggal Lahir
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat
                                    Nasabah
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi
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
                                <td>
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item"
                                                    href="<?php echo base_url(); ?>nasabah/edit/<?php echo $nas->id_nasabah; ?>">Edit</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="<?php echo base_url(); ?>nasabah/hapus/<?php echo $nas->id_nasabah; ?>"
                                                    onclick="return confirm('Yakin Hapus Nasabah Ini?')">Hapus</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>


                            </tr>
                            <?php endforeach; ?>



                        </tbody>
                    </table>
                </div>
            </div>