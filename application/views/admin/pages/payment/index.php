<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Data Pembayaran</h5>
                        <a href="<?= base_url('admin/payment/create') ?>" class="btn btn-primary">Tambah Pembayaran</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table dtable table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pembayaran</th>
                                <th>Nomor</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                            ?>
                            <?php foreach($payments as $payment) : ?>
                            <tr>
                                <td style="width:10px;" class="text-center"><?= $i++ ?></td>
                                <td><?= $payment->name ?></td>
                                <td><?= $payment->number ?></td>
                                <td><?= $payment->desc ?></td>
                                <td>
									<a href="<?= base_url('admin/payment/edit/') . $payment->id ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
									<form action="#" method="post" id="formDelete" class="d-inline">
										<button class="btn btn-sm btn-danger btnDelete" data-id="<?= $payment->id ?>"><i class="fas fa-trash"></i> Hapus</button>
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
                $('#formDelete').attr('action','<?= base_url('admin/payment/delete/') ?>' + id)
				$('#formDelete').submit();
				}
			})
		})
		
	})
</script>
<?php $this->load->view('admin/layouts/partials/alert'); ?>

