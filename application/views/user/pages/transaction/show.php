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
						@foreach ($transaction->details as $detail)
						<tr>
							<td>{{ $detail->product->name }}</td>
							<td>{{ $detail->amount }}</td>
							<td>{{ number_format($detail->product->price) }}</td>
							<td>{{ number_format($detail->product->price * $detail->amount) }}</td>
						</tr>
						@endforeach
					</table>
				</div>
			</td>
		</tr>
		<tr>
			<th>Pembayaran</th>
			<td>
				@if (!$transaction->payment)
				-
				@else
				{{ $transaction->payment->name . ' - ' . $transaction->payment->number . ' ('.$transaction->payment->desc .')' }}
				@endif
			</td>
		</tr>
		<tr>
			<th>Kurir</th>
			<td>{{ $transaction->courier }}</td>
		</tr>
		<tr>
			<th>Sub Total</th>
			<td>Rp. {{ number_format($price_total) }}</td>
		</tr>
		<tr>
			<th>Total</th>
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
