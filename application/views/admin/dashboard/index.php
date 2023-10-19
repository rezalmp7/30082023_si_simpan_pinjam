<div class="row mt-4">
    <?php if($this->session->userdata('level') != 'nasabah') { ?>
    <div class="col-12 row mb-4">
        <div class="col-lg-4 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Rp. <?php echo number_format($tabungan["nominal_tabungan"]); ?></h6>
                </div>
                <div class="card-body p-3">
                    Total Tabungan Nasabah
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Rp. <?php echo number_format($penarikan["nominal_penarikan"]); ?></h6>
                </div>
                <div class="card-body p-3">
                    Total Penarikan Nasabah
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Rp. <?php echo number_format($pinjaman["nominal_pinjaman"]); ?></h6>
                </div>
                <div class="card-body p-3">
                    Total Pinjaman Nasabah
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100 p-5">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h2 class="text-capitalize">WELLCOME</h2>
            </div>
            <div class="card-body p-3">
                <div class="fs-5">
                    Selamat Datang <b style="color: black"><?php echo $this->session->userdata('nama'); ?></b> di Dashboard<br>
                    <strong class="fs-3 mt-3">Koperasi <span style="color: #f7b928">Arta Gamma Sejahtera</span></strong>
                </div>
            </div>
        </div>
    </div>
</div>