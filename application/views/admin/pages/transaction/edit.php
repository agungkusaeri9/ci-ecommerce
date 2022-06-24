<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="text-primary font-weight-bold">Edit Transaksi <?= $transaction->uuid ?></h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/transaction/update/' . $transaction->id) ?>" method="post">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" value="<?= $transaction->name ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $transaction->email ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">No Hp</label>
                        <input type="text" name="phone_number" class="form-control" vvalue="<?= $transaction->phone_number ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea name="address" id="address" cols="30" rows="5" disabled class="form-control"><?= $transaction->address ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="payment_id">Pembayaran</label>
                        <select name="payment_id" id="payment_id" class="form-control">
                            <?php foreach($payments as $payment) : ?>
							 <option value="<?= $payment->id ?>"
							<?php if($payment->id == $transaction->payment_id) : ?>
							 selected
							<?php endif; ?>
							 ><?= $payment->name ?></option>
							<?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="courier_id">Jasa Pengiriman</label>
                        <select name="courier_id" id="courier_id" class="form-control">
                           <?php foreach($couriers as $courier) : ?>
							<option value="<?= $courier->id ?>" 
							<?php if($courier->id == $transaction->courier_id) : ?>
							 selected
							<?php endif; ?>
							><?= $courier->name ?></option>
						   <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transaction_status">Status</label>
                        <select name="transaction_status" id="transaction_status" class="form-control">
                            <option 
							<?php if($transaction->transaction_status === 'SUCCESS') : ?>
							 selected
							<?php endif; ?>
							value="SUCCESS">SUCCESS</option>
                            <option 
							<?php if($transaction->transaction_status === 'PENDING') : ?>
							 selected
							<?php endif; ?>
							value="PENDING">PENDING</option>
							<option 
							<?php if($transaction->transaction_status === 'DELIVERY') : ?>
							 selected
							<?php endif; ?>
							value="DELIVERY">DELIVERY</option>
							<option 
							<?php if($transaction->transaction_status === 'FAILED') : ?>
							 selected
							<?php endif; ?>
							value="FAILED">FAILED</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="receipt_number">No Resi</label>
                        <input type="text" name="receipt_number" class="form-control" value="<?= $transaction->receipt_number ?>">
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
