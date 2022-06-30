<!DOCTYPE html>
<html lang="id">

<head>
	<?php $this->load->view('user/layouts/partials/head') ?>
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->
<div class="d-flex success-checkout align-items-center justify-content-center">
	<div class="col col-lg-4 text-center">
		<img src="<?= base_url() ?>assets/user/img/success-buy.png" alt="" width="294">
		<h3 class="mt-4">
			Success!
		</h3>
		<p class="mt-2">
			Silahkan lakukan pembayaran dan jangan lupa upload bukti pembayarannya agar cepat diproses.
		</p>
		<a href="<?= base_url('transaction') ?>" class="primary-btn pd-cart mt-3">Kembali Ke Pesanan</a>
	</div>
</div>

<?php $this->load->view('user/layouts/partials/scripts') ?>
</body>
</html>
