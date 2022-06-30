<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laporan Transaksi</title>
	<link rel="stylesheet" href="<?= base_url('') ?>assets/user/css/bootstrap.min.css" type="text/css" />
	<style>
		* {
			color-adjust: exact;
			-webkit-print-color-adjust: exact;
		}

		.page-break {
			page-break-after: always;
		}

		body {
			font-size: 12px;
			font-family: sans-serif;
			-webkit-print-color-adjust: exact !important;
		}
	</style>
</head>

<body onload="window.print()">
	<div class="container-fluid">
		<div class="row mb-4">
			<div class="col-md-12">
				<h5 class="text-center">Laporan Transaksi
				</h5>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-3">
				<table style="width:300px">
					<tr>
						<td>Tanggal Cetak</td>
						<td>: <?= date('d-m-Y') ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-sm table-bordered">
					<thead class="align-self-center thead-dark">
						<tr>
							<th style="min-width: 20px;text-align:center">No</th>
							<th>Tanggal</th>
							<th>UUID</th>
							<th>Nama</th>
							<th>Email</th>
							<th class="text-center">Transaksi Total</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($transactions as $transaction) : ?>
							<tr>
								<td class="text-center"><?= $i; ?></td>
								<td><?= $transaction->created_at ?></td>
								<td><?= $transaction->uuid ?></td>
								<td><?= $transaction->name ?></td>
								<td><?= $transaction->email ?></td>
								<td class="text-right"><?= number_format($transaction->transaction_total) ?></td>
							</tr>
							<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script src="<?= base_url() ?>assets/bootstrap4/js/bootstrap.min.js"></script>
</body>

</html>
