<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Tambah Kategori</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/category/store') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="icon">Ikon</label>
                            <input type="file" name="icon" class="form-control" id="icon">
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
