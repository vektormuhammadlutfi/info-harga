<!doctype html>

<html lang="en">

<head>

	<?php $this->load->view('layout/partials/meta.php') ?>

	
	<title>Disperindag Gowa</title>

	<?php $this->load->view('layout/partials/style.php') ?>

</head>


<body class="nav-md">

	<div id="page">

		<?php $this->load->view('layout/partials/nav.php') ?>

		<?php $this->load->view('layout/partials/aside.php') ?>

		<!-- page content -->
        <div id="fh5co-product">
		
			<?php $this->load->view($content) ?>
		
         </div>
        <!-- /page content -->

	</div>

		<?php $this->load->view('layout/partials/footer.php') ?>
		<?php $this->load->view('layout/partials/script.php') ?>

</body>

</html>