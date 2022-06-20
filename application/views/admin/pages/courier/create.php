<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Tambah Kurir</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/courier/store') ?>" method="post">
                        <div class="form-group">
                            <label for="code">Kode</label>
                            <input type="text" name="code" class="form-control" id="code">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="numeric" name="name" class="form-control" id="name">
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
