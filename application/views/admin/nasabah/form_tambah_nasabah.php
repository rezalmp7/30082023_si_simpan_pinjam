<div class="row mt-4">
    <div class="col-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Tambah Nasabah</h6>
            </div>
            <div class="card-body p-3">
                <form action="<?php echo base_url('nasabah/tambah_nasabah_aksi') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Username</label>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Nasabah</label>
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control" placeholder="nama">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Password</label>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Alamat Nasabah</label>
                            <div class="form-group">
                                <input type="text" name="almt_nasabah" class="form-control" placeholder="Alamat Nasabah">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tempat Lahir</label>
                            <div class="form-group">
                                <input type="text" name="tmpt_lhr_nasabah" class="form-control" placeholder="Tempat Lahir Nasabah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Lahir</label>
                            <div class="form-group">
                                <input type="text" onfocus="(this.type='date')" name="tgl_lhr_nasabah" class="form-control"
                                    placeholder="Tanggal Lahir Nasabah">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>No Telfon</label>
                            <div class="form-group">
                                <input type="text" name="tlp_nasabah" class="form-control" placeholder="No Telfon">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>No Ktp</label>
                            <div class="form-group">
                                <input type="text" name="no_ktp_nasabah" class="form-control" placeholder="No Ktp Nasabah">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email Nasabah</label>
                            <div class="form-group">
                                <input type="email" name="email_nasabah" class="form-control" placeholder="Email Nasabah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Status Kawin</label>
                            <div class="form-group">
                                <input type="text" name="stts_kwn_nasabah" class="form-control" placeholder="Status Kawin Nasabah">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Pekerjaan Nasabah</label>
                            <div class="form-group">
                                <input type="text" name="pekerjaan_nasabah" class="form-control" placeholder="Pekerjaan Nasabah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Perusahaan Nasabah</label>
                            <div class="form-group">
                                <input type="text" name="nm_prshaan_nasabah" class="form-control" placeholder="Nama Perusahaan Nasabah">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Alamat Perusahaan Nasabah</label>
                            <div class="form-group">
                                <input type="text" name="almt_prshaan_nasabah" class="form-control"
                                    placeholder="Alamat Perusahaan Nasabah">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Foto Nasabah</label>
                            <div class="form-group">
                                <input type="file" name="foto" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-4">
                            <button type="submit" class="btn btn-primary ml-1">simpan</button>
                            <button type="reset" class="btn btn-danger ml-2">reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>