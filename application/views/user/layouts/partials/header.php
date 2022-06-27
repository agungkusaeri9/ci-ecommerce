<header class="header-section pb-0">
    <div class="header-top">
        <div class="container">
            <div class="ht-left mt-1">
                <div class="mail-service pt-2">
                    <i class=" fa fa-envelope"></i> tokoelektronik@gmail.com
                </div>
                <div class="phone-service pt-2">
                    <i class=" fa fa-phone"></i> +62819199123124
                </div>
            </div>
            <div class="float-right mt-1">
                <ul class="list-inline">
                    <li class="list-inline-item mr-0">
                        <a href="" class="btn btn-link text-decoration-none text-dark">Home</a>
                    </li>
					<li class="list-inline-item mr-0">
                        <a href="<?= base_url('product') ?>" class="btn btn-link text-decoration-none text-dark">Produk</a>
                    </li>
                    <li class="list-inline-item mr-0">
                        <a href="" class="btn btn-link text-decoration-none text-dark">Kontak</a>
                    </li>
                    <li class="list-inline-item mr-0">
                        <a href="" class="btn btn-link text-decoration-none text-dark">Tentang</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="">
                            <h4 style="font-family: 'Righteous', cursive;">Toko Elektronik</h4>
                        </a>
                    </div>
                </div>
				<div class="col-md-8 align-self-center">
					<input type="text" class="form-control" placeholder="Cari Produk Kesukaan Anda...">
				</div>
                <div class="col-lg-2 text-right col-md-3 align-self-center">
                    <ul class="nav-right">
                        <li class="cart-icon">
                            <?php if($this->session->userdata('id')) : ?>
							<a href=""><?= $this->session->userdata('name') ?></a>
							<a href="">
								<i class="icon_bag_alt"></i>
								<span>0</span>
							</a> &nbsp;
							<?php else: ?>
							<a href="">Akun Saya</a>
							<a href="">
								<i class="icon_bag_alt"></i>
								<span>0</span>
							</a> &nbsp;
							<?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
