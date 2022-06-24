<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h6>Tambah Produk</h6>
				</div>
				<div class="card-body">
					<form action="<?= base_url('admin/product/store') ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="image">Foto Utama</label>
							<input type="file" name="image" class="form-control">
						</div>
						<div class="form-group">
							<label for="name">Nama</label>
							<input type="text" name="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="nproduct_categoryame">Kategori</label>
							<select name="product_category" class="form-control" id="product_category">
								<option value="" selected disabled>--Kategori--</option>
								<?php foreach ($categories as $category) : ?>
									<option value="<?= $category->id ?>"><?= $category->name ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="desc">Deskripsi</label>
							<textarea name="desc" id="desc" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label for="weight">Berat (g)</label>
							<input type="number" name="weight" class="form-control">
						</div>
						<div class="form-group">
							<label for="price">Harga</label>
							<input type="number" name="price" class="form-control">
						</div>
						<div class="form-group">
							<label for="qty">Stok</label>
							<input type="number" name="qty" class="form-control">
						</div>
						<div class="form-group d-flex justify-content-end">
							<button class="btn btn-primary">Tambah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	/* .note-editor .note-editable {
		line-height: .5;
	} */
</style>
<script src="<?= base_url('assets/plugins/summernote/summernote.min.js') ?>"></script>
<script>
	$(document).ready(function() {
		$('#desc').summernote({
			height: 300,
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'underline', 'clear']],
				['fontname', ['fontname']],
				['para', ['ul', 'ol', 'paragraph']],
				['view', ['fullscreen', 'codeview', 'help']],
			],
		});
	});
</script>
