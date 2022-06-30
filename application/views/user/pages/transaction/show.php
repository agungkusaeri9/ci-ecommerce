<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr>
			<th>UUID</th>
			<td><?= $transaction->id ?></td>
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
								<td><?= $detail->name ?></td>
								<td><?= $detail->amount ?></td>
								<td><?= number_format($detail->price) ?></td>
								<td><?= number_format($detail->price*$detail->amount) ?></td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
			</td>
		</tr>
		<tr>
			<th>Pembayaran</th>
			<td>
				<?= $transaction->pay_name . ' - ' . $transaction->pay_number  . ' (' . $transaction->pay_desc . ')' ?>
			</td>
		</tr>
		<tr>
			<th>Kurir</th>
			<td><?= $transaction->courier_name ?></td>
		</tr>
		<tr>
			<th>Total Bayar</th>
			<td>Rp. <?= number_format($transaction->transaction_total) ?></td>
		</tr>
		</tr>
		<tr>
			<th>Waktu</th>
			<td><?= $transaction->created_at ?></td>
		</tr>
		<tr>
			<th>Status</th>
			<td>
				<?php if($transaction->transaction_status === 'SUCCESS') : ?>
				<span class="badge badge-success">SUCCESS</span>
				<?php elseif($transaction->transaction_status === 'PENDING'): ?>
				<span class="badge badge-warning">PENDING</span>
				<?php elseif($transaction->transaction_status === 'DELIVERY') : ?>
				<span class="badge badge-info">DELIVERY</span>
				<?php else: ?>
				<span class="badge badge-danger">FAILED</span>
				<?php endif; ?>
			</td>
		</tr>
	</table>
</div>
