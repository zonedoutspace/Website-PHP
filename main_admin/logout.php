<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<title>Logout</title>

<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<!--[if lt IE 9]>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<![endif]-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link href="../images/logos/fiji_tourism_logo_detail.gif" rel="shortcut icon" type="image/vnd.microsoft.icon"/>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>

<!-- Font Awesome-->
<link href="../assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  
</head>

<body style="background-color:white;">		
		
		<div class="nav navbar-inverse navbar-fixed-top" role="navigation">
		
			<div class="container">
			
				<div class="navbar-header" style="height:60px;">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>  
					<a href="../index.php" class="navbar-brand"><img src="../images/logos/fiji_tourism_logo_detail.gif" style="width:40px; height:40px;"></a>
				</div>
				
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="../index.php">Home</a></li>
						<li><a href="../articles/index.php">Articles</a></li>
						<li><a href="../upcoming_articles/index.php">Events</a></li>
						<li class="dropdown">
							<a href="../activities.php" class="dropdown-toggle" data-toggle="dropdown">Activities<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="../activities.php">Surfing</a></li>
								<li><a href="../activities.php">Snorkeling</a></li>
								<li><a href="../activities.php">Diving</a></li>
								<li><a href="../activities.php">Boating</a></li>
							</ul>
						</li>
						<li><a href="../contact.php">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav" style="float:right; padding:10px; padding-right:50px;">	
						<li>
							<?php 
								if (isset($_SESSION['valid_user'])){ echo '<a href="#"><button type="button" class="btn btn-success">Signed-In as '.$_SESSION['valid_user'].'</button></a>'; } else { if (isset($userid))
			 					{ echo 'Could not log you in.<br />'; } else  { echo '<a href="../login/register_form.php"><button type="button" class="btn btn-primary">Register</button></a>'; } }
			 				?>
						</li>	
						<li><?php 
								if (isset($_SESSION['valid_user'])){ echo '<a href="../login/logout.php"><button type="button" class="btn btn-danger">Logout</button></a>'; } else { if (isset($userid))
			 					{ echo 'Could not log you in.<br />'; } else  { echo '<a href="../login/login_form.php"><button type="button" class="btn btn-success">Login</button></a>'; } }
			 				?>
			 			</li>
					</ul>
				</div>	<!-- Close <div class="navbar-collapse collapse"> -->
				
			</div>	<!-- Close <div class="container"> -->
			
		</div>	<!-- Close <div class="nav navbar-default navbar-fixed-top"> -->

<?php

	require_once('includes.php');
	
	session_start();
	
	$old_user = $_SESSION['admin_user'];
	unset($_SESSION['admin_user']);
	
	session_destroy();
	
	if (!empty($old_user)) {

	echo "<div class='container' style='padding-top:200px;'>";
		echo "<h3>Logged Out</h3>";
		echo "<br>";
		do_html_url("login.php", "Login");
	echo "</div>";
	} else {
	
	echo "<div class='container' style='padding-top:200px;'>";
	  // if they weren't logged in but came to this page somehow
	  echo "<h4>You were not logged in, and so have not been logged out.</h4>";
	  echo "<br>";
	  do_html_url("login.php", "Login");
	echo "</div>";

	}


?>
