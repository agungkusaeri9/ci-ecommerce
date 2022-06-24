<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h6>Detail Transaksi</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<tr>
								<th>UUID</th>
								<td><?= $transaction->uuid ?></td>
							</tr>
							<tr>
								<th>Nama</th>
								<td><?= $transaction->name ?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?= $transaction->email ?></td>
							</tr>
							<tr>
								<th>Alamat</th>
								<td><?= $transaction->address ?></td>
							</tr>
							<tr>
								<th>Produk</th>
								<td>
									<div class="table-responsive">
										<table class="table table-bordered">
											<tr>
												<th>Nama</th>
												<th>Jumlah</th>
												<th>Harga Awal</th>
												<th>Harga Akhir</th>
											</tr>
											<?php foreach($details as $detail) : ?>
												<tr>
												<td><?= $detail->product_name ?></td>
												<td><?= $detail->amount ?></td>
												<td><?= number_format($detail->product_price) ?></td>
												<td><?= number_format($detail->product_price * $detail->amount) ?></td>
											</tr>
											<?php endforeach; ?>
										</table>
									</div>
								</td>
							</tr>
							<tr>
								<th>Pembayaran</th>
								<td>
									<?= $transaction->payment_id ?>
								</td>
							</tr>
							<tr>
								<th>Kurir</th>
								<td><?= $transaction->courier_id ?></td>
							</tr>
							<tr>
								<th>Nomor Resi</th>
								<td><?= $transaction->receipt_number ?></td>
							</tr>
							<tr>
								<th>Total</th>
								<td>Rp. <?= $transaction->transaction_total ?></td>
							</tr>
							<tr>
								<th>Tanggal</th>
								<td><?= $transaction->created_at ?></td>
							</tr>
							<tr>
								<th>Status</th>
								<td>
									<?php if ($transaction->transaction_status === 'SUCCESS') : ?>
										<span class="badge badge-success">SUCCESS</span>
									<?php elseif ($transaction->transaction_status === 'PENDING') : ?>
										<span class="badge badge-warning">PENDING</span>
									<?php elseif ($transaction->transaction_status === 'DELIVERY') : ?>
										<span class="badge badge-info">DELIVERY</span>
									<?php else : ?>
										<span class="badge badge-danger">FAILED</span>
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<th>Aksi</th>
								<td>
									<a href="<?= base_url('admin/transaction/edit/' . $transaction->id) ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
									<form action="#" method="post" class="d-inline" id="formDelete">
										<button class="btn btn-sm btn-danger btnDelete" data-id="<?= $transaction->id ?>"><i class="fas fa-trash"></i> Delete</button>
									</form>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
