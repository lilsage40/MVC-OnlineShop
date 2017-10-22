<!DOCTYPE html>
		<?php $name = $this->session->userdata('username');  ?>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Shop Item - Start Bootstrap Template</title>

		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url();?>style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="<?php echo base_url();?>style/css/shop.css" rel="stylesheet">

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	</head>

	<body>

		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<div class="container">
				<a class="navbar-brand" href="<?= base_url();?>index.php/Shop">eShop</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Contact</a>
						</li>
						<li class="nav-item">
							<?php 	if ($this->session->userdata('usertype') == "admin") : ?>
								<li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>index.php/admin">Admin Dashboard</a></li>';
								<li class="nav-item"><a class="nav-link" style="margin-left:5px" data-toggle="modal" data-target="#logout"><button class="btn btn-warning py-1">Log Out</button></a></li>
							<?php elseif ($this->session->userdata('usertype') == "user") : ?>
								<li class="nav-item"><a class="nav-link"  href="<?php echo base_url()?>index.php/user/dashboard">Your Profile</a></li>
								<li class="nav-item"><a class="nav-link" style="margin-left:5px" data-toggle="modal" data-target="#logout"><button class="btn btn-warning py-1">Log Out</button></a></li>
							<?php else : ?>
								<a class="nav-link" href="<?php echo base_url()?>index.php/Account"><button class="btn btn-success py-1">Log In</button></a>
							<?php endif; ?>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<nav class="navbar navbar-expand-lg navbar-dark bg-light" style="display: none;" id="login-nav">
			<div class="container">
				<div class="row pt-3">
					<div class="col-md-4 form-group">
						<input type="text" name="username" class="form-control" placeholder="Username">
					</div>
					<div class="col-md-4">
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>
					<div class="col-md-2">
						<input type="button" name="login" class="btn btn-success" value="Sign In"/>
					</div>
				</div>
			</div>
		</nav>