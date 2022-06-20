<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Data Pembayaran</h5>
                        <a href="<?= base_url('admin/payment/create') ?>" class="btn btn-primary">Tambah Pembayaran</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table dtable table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pembayaran</th>
                                <th>Nomor</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                            ?>
                            <?php foreach($payments as $payment) : ?>
                            <tr>
                                <td style="width:10px;" class="text-center"><?= $i++ ?></td>
                                <td><?= $payment->name ?></td>
                                <td><?= $payment->number ?></td>
                                <td><?= $payment->desc ?></td>
                                <td>Aksi</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $('.dtable').DataTable();
</script>