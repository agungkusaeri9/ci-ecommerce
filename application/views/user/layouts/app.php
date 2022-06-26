<!DOCTYPE html>
<html lang="id">

<head>
	<?php $this->load->view('user/layouts/partials/head') ?>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php $this->load->view('user/layouts/partials/header') ?>
    <!-- Header End -->

    <div style="min-height:600px">
		<?php $this->load->view($content) ?>
    </div>

    <!-- Footer Section Begin -->
    <footer class="footer-section mt-4">
	<?php $this->load->view('user/layouts/partials/footer') ?>
	</footer>

    <!-- Footer Section End -->

    <?php $this->load->view('user/layouts/partials/scripts') ?>
</body>

</html>
