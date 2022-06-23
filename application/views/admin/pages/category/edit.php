<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Edit Kategori</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/category/store') ?>" method="post">
					<input type="number" id="id" name="id" value="<?= $category->id ?>" hidden>
                        <div class="form-group">
                            <label for="icon">Kode</label>
                            <input type="file" name="icon" class="form-control" id="icon" value="<?= $category->icon ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?= $category->name ?>">
                        </div>
                        <div class="form-group">
                            <button class="btn float-right btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
