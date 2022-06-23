<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Edit Kategori</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/category/store') ?>" method="post" enctype="multipart/form-data">
					<input type="number" id="id" name="id" value="<?= $category->id ?>" hidden>
                        <div class="form-group row">
							<div class="col-md-2">
								<label for="icon">Icon</label>
								<br>
								<?php if($category->icon) : ?>
									<img src="<?= base_url('uploads/category/') . $category->icon ?>" alt="" class="img-fluid" style="max-height:80px;max-width:80px">
								<?php else: ?>
									<span class="font-italic">Tidak Ada</span>
								<?php endif; ?>
							</div>
							<div class="col-md-10 align-self-center">
								<input type="file" name="icon" class="form-control" id="icon" value="<?= $category->icon ?? '' ?>">
							</div>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?= $category->name ?>">
                        </div>
                        <div class="form-group">
                            <button class="btn float-right btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
