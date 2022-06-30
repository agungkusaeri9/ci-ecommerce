<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center page-title">Hubungi Kami</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow-1">
                <div class="card-body">
                    <h3 class="mb-4 font-weight-bold">Toko Elektronik</h3>
                    <p>Ciseureuh, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41118</p>
                    <hr>
                    <p class="my-1">Email : tokoelektronik@gmail.com</p>
                    <p class="my-1">Phone : 081919956874</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?= base_url('contact/create') ?>" method="post">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" placeholder="example@example.com" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="web">Web (Optional)</label>
                            <input type="text" class="form-control" placeholder="https://example.com" name="web" id="web">
                        </div>
                        <div class="form-group">
                            <label for="text">Pesan</label>
                            <textarea name="text" id="text" cols="30" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group float-right">
                            <button class="btn btn-primary px-4 py-2">
                                Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
