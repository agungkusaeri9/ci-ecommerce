<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Tambah Pembayaran</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/payment/store') ?>" method="post">
                        <div class="form-group">
                            <label for="name">Nama Pembayaran</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="number">Nomor</label>
                            <input type="numeric" name="number" class="form-control" id="number">
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi</label>
                            <input type="text" name="desc" class="form-control" id="desc">
                        </div>
                        <div class="form-group">
                            <button class="btn float-right btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
