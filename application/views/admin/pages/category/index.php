<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Data Kategori</h5>
                        <a href="<?= base_url('admin/category/create') ?>" class="btn btn-primary">Tambah Kategori</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table dtable table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Icon</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                            ?>
                            <?php foreach($categories as $category) : ?>
                            <tr>
                                <td style="width:10px;" class="text-center"><?= $i++ ?></td>
                                <td>
									<?php if($category->icon) : ?>
									 <img src="<?= base_url('uploads/category/') . $category->icon ?>" alt="" class="img-fluid" style="max-height:80px;max-width:80px">
									<?php else : ?>
										<span class="font-italic">Tidak Ada</span>
									<?php endif; ?>
								</td>
                                <td><?= $category->name ?></td>
                                <td>
									<a href="<?= base_url('admin/category/edit/') . $category->id ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
									<form action="" method="post" id="formDelete" class="d-inline">
										<button class="btn btn-sm btn-danger btnDelete" data-id="<?= $category->id ?>"><i class="fas fa-trash"></i> Hapus</button>
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
                $('#formDelete').attr('action','<?= base_url('admin/category/delete/') ?>' + id)
				$('#formDelete').submit();
				}
			})
		})
		
	})
</script>
<?php $this->load->view('admin/layouts/partials/alert'); ?>

