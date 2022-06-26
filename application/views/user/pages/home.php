<section class="hero-section">
    <div class="hero-items owl-carousel">
        <?php foreach($banners as $banner) : ?>
			<div class="single-hero-items set-bg" data-setbg="<?= base_url('uploads/product/') . $banner->image ?>" style="background-size:100%">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span><?= $banner->category_name ?></span>
                        <h1><?= $banner->name ?></h1>
                        <a href="{{ route('product.show', $banner->slug) }}" class="primary-btn">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
		<?php endforeach; ?>
    </div>
</section>
<section class="mb-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h6 class="mb-3 section-title text-left">Kategori</h6>
            </div>
        </div>
        <div class="row text-center">
          <?php foreach($categories as $category) : ?>
			<div class="col-3 col-lg-2 col-md-2">
                <a href="">
                    <div class="category-item mb-2">
                        <img src="<?= base_url('uploads/category/') . $category->icon ?>" alt="<?= $category->name ?>" id="category-img">
                        <h5 class="text-uppercase mt-2 category-title"><?= $category->name ?></h5>
                    </div>
                </a>
            </div>
		  <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- terlaris -->
<section class="mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-title text-left">Terlaris</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product-slider owl-carousel">
                    <?php foreach($best_products as $best) : ?>
						<div class="product-item">
                        <div class="pi-pic">
                            <img src="<?= base_url('uploads/product/') . $best->image ?>" alt="" />
                            <ul>
                                <li class="w-icon active">
                                    <a href="javascript:void(0)"><i class="icon_bag_alt"></i></a>
                                    <form action="" method="post" class="d-none" id="form-add-to-cart">
                                        <input type="hidden" name="product_id" value="<?= $best->id ?>">
                                        <input type="hidden" name="price" value="{{ <?= $best->price ?> }}">
                                    </form>
                                </li>
                                <li class="quick-view"><a href="">+ Detail</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name"><?= $best->category_name ?></div>
                            <a href="#">
                                <h5><?= $best->name ?></h5>
                            </a>
                            <div class="product-price">
                            Rp. <?= number_format($best->price) ?>
                            </div>
                        </div>
                    </div>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- product latest -->
<section class="mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<div class="d-flex justify-content-between">
					<h2 class="section-title text-left">Mungkin Anda Suka</h2>
					<div>
						<a href="" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
					</div>
				</div>
            </div>
        </div>
        <div class="row">
            <?php foreach($latest_products as $latest) : ?>
				<div class="col-6 col-md-3">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="<?= base_url('uploads/product/') . $latest->image ?>" alt="" />
                            <ul>
                                <li class="w-icon active" onclick="addToCart()">
                                    <a href="javascript:void(0)"><i class="icon_bag_alt"></i></a>
                                    <form action="" method="post" class="d-none" id="form-add-to-cart">
                                        @csrf
                                        <input type="hidden" name="product_id" value="<?= $latest->id ?>">
                                        <input type="hidden" name="price" value="<?= $latest->price ?>">
                                    </form>
                                </li>
                                <li class="quick-view"><a href="">+ Detail</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name"><?= $best->category_name ?></div>
                            <a href="#">
                                <h5><?= $best->name ?></h5>
                            </a>
                            <div class="product-price">
                            Rp. <?= number_format($best->price) ?>
                            </div>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
    </div>
</section>
