<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Tambah User</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/user/store') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
						<div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username">
                        </div>
						<div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                        </div>
						<div class="form-group">
                            <label for="phone_number">No. Telepon</label>
                            <input type="text" name="phone_number" class="form-control" id="phone_number">
                        </div>
						<div class="form-group">
							<label for="gender">Jenis Kelamin</label><br>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="lk" value="laki-laki">
								<label class="form-check-label" for="lk">Laki-Laki</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="per" value="perempuan">
								<label class="form-check-label" for="per">Perempuan</label>
							</div>
						</div>
						<div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
						<div class="form-group">
							<label for="role_id">Role</label><br>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="role_id" id="admin" value="1">
								<label class="form-check-label" for="admin">Admin</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="role_id" id="user" value="2" checked>
								<label class="form-check-label" for="user">User</label>
							</div>
						</div>
						<div class="form-group">
                            <label for="avatar">Avatar</label>
                            <input type="file" name="avatar" class="form-control" id="avatar">
                        </div>
                        <div class="form-group">
                            <button class="btn float-right btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
