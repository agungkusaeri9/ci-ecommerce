<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url('admin/dashboard') ?>" class="brand-link text-center mt-4">
		<i i class="fas fa-shopping-cart fa-2x"></i>
		<span class="brand-text font-weight-light mx-3" style="font-size: 26px;">E-commerce</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar mt-3">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
					alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $this->auth->user()->name ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
						<i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-header">Master</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/payment') ?>" class="nav-link">
						<i class="nav-icon fas fa-fw fa-wallet"></i>
						<p>
							Metode Pembayaran
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/courier') ?>" class="nav-link">
						<i class="nav-icon fas fa-fw fa-truck"></i>
						<p>
							Kurir
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link">
						<i class="nav-icon fas fa-fw fa-users"></i>
						<p>
							User
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/message') ?>" class="nav-link">
						<i class="nav-icon fas fa-fw fa-envelope"></i>
						<p>
							Pesan Masuk
						</p>
					</a>
				</li>
				<li class="nav-header">Produk</li>
				<li class="nav-item">
					<a href="<?= base_url('admin/category') ?>" class="nav-link">
						<i class="nav-icon fas fa-fw fa-tags"></i>
						<p>
							Kategori Produk
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link">
						<i class="nav-icon fas fa-fw fa-database"></i>
						<p>
							Produk
						</p>
					</a>
				</li>
				<li class="nav-header">Transaksi</li>
				<li class="nav-item">
					<a href="" class="nav-link">
						<i class="nav-icon fas fa-fw fa-exchange-alt"></i>
						<p>
							Transaksi Masuk
						</p>
					</a>
				</li>
				<li class="nav-header">Laporan</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon far fa-file"></i>
						<p>
							Laporan
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Transaksi</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Produk</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>User</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-header">Setting</li>
				<li class="nav-item">
					<a href="" class="nav-link">
						<i class="nav-icon fas fa-fw fa-cog"></i>
						<p>
							Pengaturan Web
						</p>
					</a>
				</li>
				<li class="nav-item mb-5">
					<a href="<?= base_url('auth/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
