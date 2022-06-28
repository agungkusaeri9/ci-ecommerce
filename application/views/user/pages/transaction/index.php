<div class="container">
<?php $this->load->view('user/layouts/partials/alert') ?>
    <div class="row">
        <div class="col-md-3">
        <?php $this->load->view('user/layouts/partials/sidebar-user') ?>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($transactions as $transaction) : ?>
                                    <tr>
                                        <td>
                                            <a href="" class="uuid text-dark" ><?= $transaction->id ?></a>
                                        </td>
                                        <td><?= $transaction->name ?></td>
                                        <td><?= $transaction->address ?></td>
                                        <td>Rp. <?= number_format($transaction->transaction_total) ?></td>
                                        <td>
                                            <?php if($transaction->transaction_status === 'SUCCESS') : ?>
                                                <span class="badge badge-success">SUCCESS</span>
                                            <?php elseif($transaction->transaction_status === 'PENDING'): ?>
                                                <span class="badge badge-warning">PENDING</span>
                                            <?php elseif($transaction->transaction_status === 'DELIVERY') : ?>
                                                <span class="badge badge-info">DELIVERY</span>
                                            <?php else: ?>
                                                <span class="badge badge-danger">FAILED</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-warning btnDetail" data-url="<?= base_url('transaction/show/') . $transaction->id ?>">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(function(){
        $('body').on('click','.btnDetail', function(){
            var url = $(this).data('url');
            $('#modalDetail').find('.modal-body').load(url)
            $('#modalDetail').modal('show');
        })
    })
</script>