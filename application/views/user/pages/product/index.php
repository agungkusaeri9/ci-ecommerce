<section class="products my-0 py-0">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h2 class="section-title text-left">Semua Produk</h2>
			</div>
		</div>
		<div class="row">
			<?php foreach ($products as $product) : ?>
				<div class="col-6 col-md-3">
					<div class="product-item">
						<div class="pi-pic">
							<img src="<?= base_url('uploads/product/') . $product->image ?>" alt="" />
							<ul>
								<li class="w-icon active" onclick="addToCart()">
									<a href="javascript:void(0)"><i class="icon_bag_alt"></i></a>
									<form action="{{ route('cart.store') }}" method="post" class="d-none" id="form-add-to-cart">
										<input type="hidden" name="product_id" value="<?= $product->id ?>">
										<input type="hidden" name="price" value="<?= $product->price ?>">
									</form>
								</li>
								<li class="quick-view"><a href="<?= base_url('product/show/') . $product->slug ?>">+ Quick View</a></li>
							</ul>
						</div>
						<div class="pi-text">
							<div class="catagory-name"><?= $product->category_name ?></div>
							<a href="#">
								<h5><?= $product->name ?></h5>
							</a>
							<div class="product-price">
								Rp. <?= number_format($product->price) ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php if (empty($products)) : ?>
			<div class="row mt-2 mb-4">
				<div class="col-md-12">
					<div class="alert alert-danger text-center">
						Produk <?=  '"' . $this->input->get('q') . '"' ?? '' ?> tidak ditemukan.
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
