<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Edit User</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/user/store') ?>" method="post" enctype="multipart/form-data">
					<input type="number" id="id" name="id" value="<?= $user->id ?>" hidden>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?= $user->name ?>">
                        </div>
						<div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" value="<?= $user->username ?>">
                        </div>
						<div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?= $user->email ?>">
                        </div>
						<div class="form-group">
                            <label for="phone_number">No. Telepon</label>
                            <input type="text" name="phone_number" class="form-control" id="phone_number" value="<?= $user->phone_number ?>">
                        </div>
						<div class="form-group">
							<label for="gender">Jenis Kelamin</label><br>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="lk" value="laki-laki"
								<?php if($user->gender === 'laki-laki') : ?>
								 checked
								<?php endif; ?>>
								<label class="form-check-label" for="lk">Laki-Laki</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="per" value="perempuan" 
								<?php if($user->gender === 'perempuan') : ?>
								 checked
								<?php endif; ?>>
								<label class="form-check-label" for="per">Perempuan</label>
							</div>
						</div>
						<div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Kosongkan jika tidak ingin merubah password">
                        </div>
						<div class="form-group">
							<label for="role_id">Role</label><br>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="role_id" id="admin" value="1"
								<?php if($user->role_id == 1) : ?>
								 checked
								<?php endif; ?>>
								<label class="form-check-label" for="admin">Admin</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="role_id" id="user" value="2" 
								<?php if($user->role_id == 2) : ?>
								 checked
								<?php endif; ?>>
								<label class="form-check-label" for="user">User</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2">
								<label for="avatar">Avatar</label>
								<br>
								<?php if($user->avatar) : ?>
									<img src="<?= base_url('uploads/user/') . $user->avatar ?>" alt="" class="img-fluid" style="max-height:80px;max-width:80px">
								<?php else: ?>
									<span class="font-italic">Tidak Ada</span>
								<?php endif; ?>
							</div>
							<div class="col-md-10 align-self-center">
								<input type="file" name="avatar" class="form-control" id="avatar">
							</div>
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
