<!doctype html>

<html lang="en">

<head>

	<?php $this->load->view('layout/partials/meta.php') ?>

	
	<title>Admin</title>

	<?php $this->load->view('layout/partials/style.php') ?>

</head>


<body class="nav-md">
	<div class="container body">
		<div class="main_container">

		<?php $this->load->view('layout/partials/nav.php') ?>

		<?php $this->load->view('layout/partials/topnav.php') ?>

		<!-- page content -->
        <div class="right_col" role="main">
		
			<?php $this->load->view($content) ?>
		
        </div>
        <!-- /page content -->

		</div>
	</div>

		<?php $this->load->view('layout/partials/footer.php') ?>
		<?php $this->load->view('layout/partials/script.php') ?>

</body>

</html>