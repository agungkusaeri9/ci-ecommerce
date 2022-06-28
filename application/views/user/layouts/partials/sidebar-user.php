<div class="list-group mb-2">
    <a href="" class="list-group-item list-group-item-action" aria-current="true">
      Akun Saya
    </a>
    <a href="<?= base_url('transaction') ?>" class="list-group-item list-group-item-action">
        Pesanan
    </a>
    <a href="" class="list-group-item list-group-item-action" onclick="event.preventDefault(); confirm('Apakah yakin ingin keluar?');
    document.getElementById('logout-form').submit();">
      Logout
    </a>
    <form method="post" action="" class="d-none" id="logout-form">
      @csrf
    </form>
</div>
