<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow">
				<div class="card-header d-flex justify-content-between">
					<h6 class="text-dark font-weight-bold">Data Transaksi</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table dtable table-bordered table-hover table-striped" id="data">
							<thead>
								<tr>
									<th width=10>#</th>
									<th>UUID</th>
									<th>Nama</th>
									<th>No Hp</th>
									<th>Total</th>
									<th>Status</th>
									<th>Tanggal</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								?>
								<?php foreach ($transactions as $transaction) : ?>
									<tr>
										<td><?= $i ?></td>
										<td><?= $transaction->uuid ?></td>
										<td><?= $transaction->name ?></td>
										<td><?= $transaction->phone_number ?></td>
										<td>Rp. <?= number_format($transaction->transaction_total) ?></td>
										<td>
											<?php if($transaction->transaction_status === 'SUCCESS') : ?>
												<span class="badge badge-success">SUCCESS</span>
											<?php elseif($transaction->transaction_status === 'PENDING'): ?>
												<span class="badge badge-warning">PENDING</span>
											<?php elseif($transaction->transaction_status === 'DELIVERY'): ?>
												<span class="badge badge-info">DELIVERY</span>
											<?php else : ?>
												<span class="badge badge-danger">FAILED</span>
											<?php endif; ?>
										</td>
										<td>
										<?= $transaction->created_at ?>
										</td>
										<td>
											<a href="<?= base_url('admin/transaction/show/' . $transaction->id) ?>" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i> Detail</a>
											<a href="<?= base_url('admin/transaction/edit/' . $transaction->id) ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
											<form action="#" method="post" class="d-inline" id="formDelete">
												<button class="btn btn-sm btn-danger btnDelete" data-id="<?= $transaction->id ?>"><i class="fas fa-trash"></i> Delete</button>
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
	<!-- Modal -->
	<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                $('#formDelete').attr('action','<?= base_url('admin/transaction/delete/') ?>' + id)
				$('#formDelete').submit();
				}
			})
		})
		
	})
</script>
<?php $this->load->view('admin/layouts/partials/alert'); ?>
