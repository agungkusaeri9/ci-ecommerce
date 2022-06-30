<div class="list-group mb-2">
    <a href="<?= base_url('account') ?>" class="list-group-item list-group-item-action <?php if($this->uri->segment(1) === 'account') : ?>active<?php endif; ?>" aria-current="true">
      Akun Saya
    </a>
    <a href="<?= base_url('transaction') ?>" class="list-group-item list-group-item-action <?php if($this->uri->segment(1) === 'transaction') : ?>active<?php endif; ?>">
        Pesanan
    </a>
    <a href="" class="list-group-item list-group-item-action" onclick="event.preventDefault(); confirm('Apakah yakin ingin keluar?');
    document.getElementById('logout-form').submit();">
      Logout
    </a>
    <form method="post" action="<?= base_url('auth/logout') ?>" class="d-none" id="logout-form">
      @csrf
    </form>
</div>
