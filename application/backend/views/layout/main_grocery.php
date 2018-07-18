<!doctype html>

<html lang="en">

<head>

	<?php $this->load->view('layout/partials/meta.php') ?>

	
	<title>Admin</title>

	<?php foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>

	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
	<!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
    <link href="<?php echo base_url();?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url();?>assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
	<!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/admin/build/css/custom.min.css" rel="stylesheet">

</head>


<body class="nav-md">
	<div class="container body">
		<div class="main_container">

		<?php $this->load->view('layout/partials/nav.php') ?>

		<?php $this->load->view('layout/partials/topnav.php') ?>

		<!-- page content -->
        <div class="right_col" role="main">
		
			<?php if ( !empty($content) ) echo $content; ?>
			<?php $this->load->view($content) ?>

        </div>
        <!-- /page content -->

		</div>
	</div>

		<?php $this->load->view('layout/partials/footer.php') ?>

	    <!-- Bootstrap -->
	    <script src="<?php echo base_url();?>assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	    <!-- FastClick -->
	    <script src="<?php echo base_url();?>assets/admin/vendors/fastclick/lib/fastclick.js"></script>
	    <!-- NProgress -->
	    <script src="<?php echo base_url();?>assets/admin/vendors/nprogress/nprogress.js"></script>
	    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assets/admin/build/js/custom.min.js"></script>

</body>

</html>