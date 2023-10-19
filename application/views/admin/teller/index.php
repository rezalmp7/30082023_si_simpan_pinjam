<div class="col-12 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize d-inline">Data teller</h6>
            <?php if($this->session->userdata('level') == 'teller') { ?>
            <a href="<?php echo base_url('teller/tambah_teller') ?>" class="btn btn-success btn-sm float-end">Tambah</a>
            <?php } ?>
        </div>
        <div class="card-body p-3">
            <?php echo $this->session->flashdata('pesan') ?>
            <div class="card">
                <div class="table">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                    teller</th>
                                <?php if($this->session->userdata('level') == 'teller') { ?>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi
                                </th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($teller as $nas) : ?>
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
                                <?php if($this->session->userdata('level') == 'teller') { ?>
                                <td>
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item"
                                                    href="<?php echo base_url(); ?>teller/edit/<?php echo $nas->id_teller; ?>">Edit</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="<?php echo base_url(); ?>teller/hapus/<?php echo $nas->id_teller; ?>"
                                                    onclick="return confirm('Yakin Hapus teller Ini?')">Hapus</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php endforeach; ?>



                        </tbody>
                    </table>
                </div>
            </div>