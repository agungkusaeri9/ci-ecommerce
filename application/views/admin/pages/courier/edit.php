<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Edit Kurir</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/courier/store') ?>" method="post">
					<input type="number" id="id" name="id" value="<?= $courier->id ?>" hidden>
                        <div class="form-group">
                            <label for="code">Kode</label>
                            <input type="text" name="code" class="form-control" id="code" value="<?= $courier->code ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?= $courier->name ?>">
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
