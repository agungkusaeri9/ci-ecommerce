<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Data Pesan Masuk</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table dtable table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Web</th>
								<th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                            ?>
                            <?php foreach($messages as $message) : ?>
                            <tr>
                                <td style="width:10px;" class="text-center"><?= $i++ ?></td>
                                <td><?= $message->name ?></td>
                                <td><?= $message->email ?></td>
                                <td><?= $message->web ?></td>
								<td><?= $message->text ?></td>
                                <td>
									<form action="<?= base_url('admin/message/delete/') . $message->id ?>" method="post" id="formDelete" class="d-inline">
										<button class="btn btn-sm btn-danger btnDelete"><i class="fas fa-trash"></i> Hapus</button>
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
					$('#formDelete').submit();
				}
			})
		})
		
	})
</script>
<?php $this->load->view('admin/layouts/partials/alert'); ?>
