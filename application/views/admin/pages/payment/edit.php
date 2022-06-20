<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Edit Metode Pembayaran</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/payment/store') ?>" method="post">
					<input type="number" id="id" name="id" value="<?= $payment->id ?>" hidden>
                        <div class="form-group">
                            <label for="name">Nama Pembayaran</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?= $payment->name ?>">
                        </div>
                        <div class="form-group">
                            <label for="number">Nomor</label>
                            <input type="text" name="number" class="form-control" id="number" value="<?= $payment->number ?>">
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi</label>
                            <input type="text" name="desc" class="form-control" id="desc" value="<?= $payment->desc ?>">
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
