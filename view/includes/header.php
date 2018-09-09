<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo WEBSITE_URL;?>assets/js/main.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_URL;?>assets/css/main.css">
	</head>
	<body>
		<!-- navbar-fixed-top -->
		<nav class="navbar navbar-default">
	     	<a href="<?php echo WEBSITE_URL;?>"><img src="<?php echo WEBSITE_URL;?>assets/img/website/pharmacy_icon.jpg" alt="icon" class="logo img-rounded"></a>
		 	<div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                        
			      </button>
			      <a class="navbar-brand" href="<?php echo WEBSITE_URL;?>">Apoteka</a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul class="nav navbar-nav">
				        <!-- <li><a href="<?php echo WEBSITE_URL;?>">home</a></li> -->
						<li><a href="<?php echo WEBSITE_URL.'about_us';?>">about_us</a></li>
						<li><a href="<?php echo WEBSITE_URL.'products';?>">products</a></li>
						<li><a href="<?php echo WEBSITE_URL.'advices';?>">advices</a></li>
						<li><a href="<?php echo WEBSITE_URL.'contact';?>">contact</a></li>
			<!-- 			<li><a href="<?php echo WEBSITE_URL.'client';?>">client</a></li>
						<li><a href="<?php echo WEBSITE_URL.'admin';?>">admin</a></li> -->
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <?php 
			        	if (isset($_SESSION['user'])) {
			        		?>
			        		<li><a href="<?php echo WEBSITE_URL.'client';?>"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
			        		<?php
			        	}
			        	if (isset($_SESSION['admin'])) {
			        		?>
			       			<li><a href="<?php echo WEBSITE_URL.'admin';?>"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
			        		<?php
			        	}
			        ?>
			        <li><a href="<?php echo WEBSITE_URL.'client/chart';?>"><span class="glyphicon glyphicon-shopping-cart"></span> Korpa</a></li>
			        <li><a href="<?php echo WEBSITE_URL.'registration';?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			      </ul>
			    </div>
			</div>
		</nav>
