<?php if($this->session->flashdata('success')) : ?>
 <div class="alert alert-success">
	<strong>Sukses!</strong> <?= $this->session->flashdata('success') ?>
 </div>
<?php elseif($this->session->flashdata('success')) : ?>
	<div class="alert alert-error">
	<strong>Gagal!</strong> <?= $this->session->flashdata('error') ?>
 </div>
<?php endif; ?>
