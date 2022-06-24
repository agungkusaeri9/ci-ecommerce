<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Data Produk</h5>
                        <a href="<?= base_url('admin/product/create') ?>" class="btn btn-primary">Tambah Produk</a>
                    </div>
                </div>
                <div class="card-body">
					<table class="table dtable table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="20" class="text-center">No.</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Berat (g)</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Terjual</th>
                                <th class="text-center" style="min-width:110px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                                $i = 1;
                            ?>
                            <?php foreach($products as $product) : ?>
                                <tr>
                                    <td class="text-center"><?= $i++ ?></td>
                                    <td><?= $product->name ?></td>
                                    <td><?= $product->category_name ?></td>
                                    <td><?= $product->weight ?></td>
                                    <td><?= $product->qty ?></td>
                                    <td>Rp. <?= number_format($product->price) ?></td>
                                    <td><?= $product->sold ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/product/show/') . $product->id ?>" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i> Detail</a>
                                        <a href="<?= base_url('admin/product/edit/') . $product->id ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
										<form action="" method="post" id="formDelete" class="d-inline">
											<button class="btn btn-sm btn-danger btnDelete" data-id="<?= $product->id ?>"><i class="fas fa-trash"></i> Hapus</button>
										</form>
                                    </td>
                                </tr>
								<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
	$(function(){
		$('.dtable').DataTable();
		$('body').on('click','.btnDelete', function(e){
            var id = $(this).data('id');
			e.preventDefault();
			Swal.fire({
			title: 'Apakah anda yakin ingin menghapus data ini?',
			text: "Data yang sudah dihapus tidak bisa dikembalikan lagi!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			if (result.isConfirmed) {
                $('#formDelete').attr('action','<?= base_url('admin/product/delete/') ?>' + id)
				$('#formDelete').submit();
				}
			})
		})
		
	})
</script>
<?php $this->load->view('admin/layouts/partials/alert'); ?>

