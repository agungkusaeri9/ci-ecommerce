<div class="container">
    <?php $this->load->view('user/layouts/partials/alert') ?>
</div>
<div class="breacrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-text product-more">
					<a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a>
					<span>Cart</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Gambar</th>
                                <th class="p-name text-center">Nama</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($carts as $cart) : ?>
                                <tr>
                                    <td class="cart-pic first-row">
                                        <img src="<?= base_url('uploads/product/') . $cart->product_image ?>" style="height: 80px" />
                                    </td>
                                    <td class="cart-title first-row text-center">
                                        <h5><?= $cart->product_name ?></h5>
                                    </td>
                                    <td>Rp. <?= number_format($cart->product_price) ?></td>
                                    <td class="text-center"><?= $cart->amount ?></td>
                                    <td class="p-price first-row"><?= number_format($cart->price) ?> </td>
                                    <td><?= $cart->notes ?></td>
                                    <td class="delete-item text-center">
                                        <form action="<?= base_url('cart/delete/') . $cart->id ?>" method="post">
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah yakin ingin menghapus item ini dari keranjang?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
							<?php if(empty($carts)) : ?>
							 <tr>
								<td colspan="7" class="text-center">Keranjang Kosong!</td>
							 </tr>
							<?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-4 justify-content-end">
            <div class="col-lg-5">
                <h4 class="mb-4">
                    Informasi Pembeli:
                </h4>
                <div class="user-checkout">
                    <form method="post" action="<?= base_url('checkout') ?>" >
                        <div class="form-group">
                            <label for="namaLengkap">Nama lengkap</label>
                            <input type="text" class="form-control" id="namaLengkap" aria-describedby="namaHelp"
                                placeholder="Masukan Nama" value="<?= $this->session->userdata('name') ?>" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" aria-describedby="emailHelp"
                                placeholder="Masukan Email" value=""
                                name="email">
                        </div>
                        <div class="form-group">
                            <label for="namaLengkap">Nomor HP</label>
                            <input type="text" class="form-control" id="noHP" aria-describedby="noHPHelp"
                                placeholder="Masukan No. HP" value=""
                                name="phone_number">
                        </div>
                        <div class="form-group">
                            <label for="alamatLengkap">Alamat Lengkap</label>
                            <textarea class="form-control" id="alamatLengkap" rows="3" name="address"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="payment">Metode Pembayaran</label>
                            <select name="payment_id" id="payment" class="form-control">
                                <option value="">-- Pilih Pembayaran --</option>
                                <?php foreach($payments as $payment) : ?>
                                    <option value="<?= $payment->id ?>"><?= $payment->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="courier">Jasa Pengiriman</label>
                            <select name="courier_id" id="courier" class="form-control">
                                <option value="">-- Pilih Kurir --</option>
                                <?php foreach($couriers as $courier) : ?>
                                    <option value="<?= $courier->id ?>"><?= $courier->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark btn-block">Checkout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
