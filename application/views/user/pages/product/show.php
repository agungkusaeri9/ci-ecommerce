<div class="container">
    <?php $this->load->view('user/layouts/partials/alert') ?>
</div>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
                    <a href="<?= base_url('product') ?>">Produk</a>
                    <span><?= $product->name ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="<?= base_url('uploads/product/') . $product->image ?>" alt="<?= $product->name ?>" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span><?= $product->category_name ?></span>
                                <h3><?= $product->name ?></h3>
                            </div>
                            <div class="pd-desc" style="min-height: 305px">
                                <p>
								<?= $product->desc ?>
                                </p>
                                <p class="font-weight-bold mb-0 pb-0">Terjual : <?= $product->sold ?></p>
                                <p class="font-weight-bold">Stok : <?= $product->qty ?></p>
                                <h4>Rp. <?= number_format($product->price) ?></h4>
                            </div>
                            <div class="form">
                                <form action="<?= base_url('cart/add') ?>" method="post">
                                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                                    <input type="hidden" name="price" value="<?= $product->price ?>">
                                    <div class="form-group">
                                        <label for="">Jumlah</label>
                                        <input type="number" name="amount" class="form-control" value="1" style="width: 60px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan</label>
                                        <textarea name="notes" id="notes" cols="30" rows="3" class="form-control" placeholder="Cth. Ukuran L, Warna Merah"></textarea>
                                    </div>
                                    <button class="primary-btn btn pd-cart">Tambah Keranjang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
