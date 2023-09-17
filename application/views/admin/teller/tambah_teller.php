<div class="row mt-4">
    <div class="col-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Tambah teller</h6>
            </div>
            <div class="card-body p-3">
                <form action="<?php echo base_url('teller/store') ?>" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Username</label>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Nama teller</label>
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