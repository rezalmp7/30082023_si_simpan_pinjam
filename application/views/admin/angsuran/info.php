
<div class="row mt-4">
    <div class="col-md-7 mt-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Informasi Pinjaman</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <div class="d-flex flex-column bg-gray-100 p-3 rounded">
                    <h6 class="mb-3 text-md"><?php echo $pinjaman->tgl_pinjaman; ?></h6>
                    <h6 class="text-sm mb-2">Informasi Nasabah</h6>
                    <span class="mb-2 text-xs">Nama: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $nasabah->nama; ?></span></span>
                    <span class="mb-2 text-xs">Alamat: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $nasabah->almt_nasabah; ?></span></span>
                    <span class="mb-2 text-xs">TTL: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $nasabah->tmpt_lhr_nasabah; ?>, <?php echo date("d/m/Y", strtotime($nasabah->tgl_lhr_nasabah)); ?></span></span>
                    <span class="mb-2 text-xs">NIK: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $nasabah->no_ktp_nasabah; ?></span></span>
                    <span class="mb-2 text-xs">Telephone: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $nasabah->tlp_nasabah; ?></span></span>
                    <span class="mb-2 text-xs">Email: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $nasabah->email_nasabah; ?></span></span>
                    <span class="mb-2 text-xs">Status Kawin: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $nasabah->stts_kwn_nasabah == 1 ? "Sudah Kawin" : "Belum Kawin"; ?></span></span>
                    <span class="mb-2 text-xs">Pekerjaan: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $nasabah->pekerjaan_nasabah; ?></span></span>
                    <span class="mb-2 text-xs">Nama Perusahaan: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $nasabah->nm_prshaan_nasabah; ?></span></span>
                    <span class="mb-2 text-xs">Alamat Perusahaan: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $nasabah->almt_prshaan_nasabah; ?></span></span>

                    
                    <h6 class="text-sm mb-2">Informasi Pinjaman</h6>
                    <span class="mb-2 text-xs">Jangka Pinjaman: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $pinjaman->jangka_pinjaman; ?> Tahun</span></span>
                    <span class="mb-2 text-xs">Nominal Pinjaman: <span class="text-dark font-weight-bold ms-sm-2">Rp <?php echo number_format($pinjaman->nominal_pinjaman); ?></span></span>
                    <span class="mb-2 text-xs">Bunga: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $pinjaman->bunga; ?>%</span></span>
                    <span class="mb-2 text-xs">Nominal Angsuran: <span class="text-dark font-weight-bold ms-sm-2">Rp <?php echo number_format($pinjaman->nominal_angsuran); ?></span></span>
                    <span class="mb-2 text-xs">Nominal Disetujui: <span class="text-dark font-weight-bold ms-sm-2">Rp <?php echo number_format($pinjaman->nominal_setuju); ?></span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 mt-4">
        <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-0">Angsuran</h6>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <i class="far fa-calendar-alt me-2"></i>
                        <small><?php echo date('d M Y', strtotime($pinjaman->tgl_pinjaman)); ?> - <?php echo date("d M Y", strtotime('+'.$pinjaman->jangka_pinjaman.' year', strtotime($pinjaman->tgl_pinjaman))); ?></small>
                    </div>
                </div>
            </div>
            <div class="card-body pt-4 p-3" style="height: 500px; overflow-y: scroll;">
                <ul class="list-group">
                    <?php
                    for ($i=0; $i < $pinjaman->jangka_pinjaman*12; $i++) { 
                    ?>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-hourglass-half"></i></button>
                            <div class="d-flex flex-column">
                                <?php $numberOf = $i+1; ?>
                                <h6 class="mb-1 text-dark text-sm">Angsuran #<?php echo $numberOf; ?></h6>
                                <span class="text-xs"><?php echo date("M Y", strtotime('+'.$numberOf.' month', strtotime($pinjaman->tgl_pinjaman))); ?></span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-primary text-gradient text-sm font-weight-bold">
                            <?php $nominalBunga = ($pinjaman->nominal_setuju*$pinjaman->bunga/100)/12; ?>
                            Rp <?php echo number_format($pinjaman->nominal_angsuran + $nominalBunga); ?>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>