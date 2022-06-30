<div class="container">
<?php $this->load->view('user/layouts/partials/alert') ?>
    <div class="row">
        <div class="col-md-4">
        <?php $this->load->view('user/layouts/partials/sidebar-user') ?>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <td colspan="2" class="text-center mb-2">
                                    <?php if($user->avatar) : ?>
                                        <img src="<?= base_url('uploads/user/') . $user->avatar ?>" alt="">
                                    <?php else: ?>
                                        Tidak Ada Gambar
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?= $user->name ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><?= $user->username ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $user->email ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?= $user->gender ?? '-' ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Hp</th>
                                <td><?= $user->phone_number ?? '-' ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= $user->address ?? '-' ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right">
                                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#modalEditAccount"><i class="fas fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalEditAccount" tabindex="-1" aria-labelledby="modalEditAccountLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditAccountLabel">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('Account/update') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="avatar">Foto</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" value="<?= $user->name ?>">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" readonly value="<?= $user->username ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $user->email ?>"readonly>
                </div>
                <div class="form-group">
                    <label for="phone_number">Nomor Hp</label>
                    <input type="text" class="form-control" name="phone_number" value="<?= $user->phone_number ?>">
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="laki-laki"
                        <?php if($user->gender === 'laki-laki') : ?>
                            checked
                        <?php endif; ?>
                        >
                        <label class="form-check-label" for="laki-laki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="perempuan" value="perempuan"
                        <?php if($user->gender === 'perempuan') : ?>
                            checked
                        <?php endif; ?>
                        >
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="addredd">Alamat</label>
                    <textarea name="address" id="address" cols="30" rows="3" class="form-control"><?= $user->address ?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>