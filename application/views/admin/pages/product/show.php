<div class="container-fluid">
<div class="row mb-3">
    <div class="col-lg-5 mb-3">
        <div class="row mb-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h6 class="text-dark">Foto Utama</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if($product->image) : ?>
							<img src="<?= base_url('uploads/product/' . $product->image) ?>" alt="<?= $product->name ?>" data-id="{{ $product->id }}" data-title="Gambar Produk" data-src="<?= base_url('uploads/product/' . $product->image) ?>" class="img-thumbnail img-fluid mb-1 foto">
						<?php else: ?>
						<div class="alert alert-danger text-center">
							<strong>Foto Tidak Ditemukan!</strong>
						</div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="text-dark text-center font-weight-bold">Detail Produk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped">
                        <tr>
                            <th>Nama Produk</th>
                            <td><?= $product->name ?></td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td><?= $product->category_name ?></td>
                        </tr>
                        <tr>
                            <th>Deskrpisi</th>
                            <td><?= $product->desc ?></td>
                        </tr>
                        <tr>
                            <th>Berat (g)</th>
                            <td><?= $product->weight ?> g</td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td><?= $product->qty ?></td>
                        </tr>
                        <tr>
                            <td>Harga</th>
                            <td>Rp. <?= number_format($product->price) ?></td>
                        </tr>
                        <tr>
                            <td>Terjual</th>
                            <td><?= $product->sold ?></td>
                        </tr>
                        <tr>
                            <th>Dibuat</th>
                            <td><?= $product->created_at ?></td>
                        </tr>
						<tr>
                            <th>Diedit</th>
                            <td><?= $product->created_at ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="uploadModal" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.product-galleries.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="product_id" id="product_id">
                <div class="form-group">
                    <label for="photo">Gambar  <small class="text-danger">(Boleh lebih dari 1)</small></label>
                    <input type="file" class="form-control" name="photo[]" id="photo" multiple>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>
<div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Gambar Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <img src="" alt="" class="foto-modal img-fluid">
          </div>
        </div>
        <div class="modal-footer">
            <form action="" method="post" id="formActive">
                @csrf
                <button type="submit" class="btn btn-success">Set Aktif</button>
            </form>
            <form action="" method="post" id="formDelete">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
      </div>
    </div>
</div>
</div>
