<?php
	session_start();

	require_once 'helpers/security.php';
	
	// set session variable errors to errors or set empty array[]
	$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
	
	// Same for this.
	$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];

	
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<title>Contact Page</title>

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<!--[if lt IE 9]>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<![endif]-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/contact.css">
<link href="images/logos/fiji_tourism_logo_detail.gif" rel="shortcut icon" type="image/vnd.microsoft.icon"/>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>   

<!-- Font Awesome-->
<link href="assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>


	<div class="nav navbar-inverse navbar-fixed-top" role="navigation">
		
			<div class="container">
			
				<div class="navbar-header" style="height:60px;">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>  
					<a href="index.php" class="navbar-brand"><img src="images/logos/fiji_tourism_logo_detail.gif" style="width:40px; height:40px;"></a>
				</div>
				
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="articles/index.php">Articles</a></li>
						<li><a href="upcoming_articles/index.php">Events</a></li>
						<li class="dropdown">
							<a href="activities.php" class="dropdown-toggle" data-toggle="dropdown">Activities<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="activities.php">Surfing</a></li>
								<li><a href="activities.php">Snorkeling</a></li>
								<li><a href="activities.php">Diving</a></li>
								<li><a href="activities.php">Boating</a></li>
							</ul>
						</li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav" style="float:right; padding-right:50px;">	
						<li><?php 
								if (isset($_SESSION['valid_user'])){ echo '<a href="#"><button type="button" class="btn btn-success">Signed-In as '.$_SESSION['valid_user'].'</button></a>'; } else { if (isset($userid))
			 					{ echo 'Could not log you in.<br />'; } else  { echo '<a href="login/register_form.php"><button type="button" class="btn btn-primary">Register</button></a>'; } }
			 				?>
						</li>	
						<li><?php 
								if (isset($_SESSION['valid_user'])){ echo '<a href="login/logout.php"><button type="button" class="btn btn-danger">Logout</button></a>'; } else { if (isset($userid))
			 					{ echo 'Could not log you in.<br />'; } else  { echo '<a href="login/login_form.php"><button type="button" class="btn btn-success">Login</button></a>'; } }
			 				?>
			 			</li>
					</ul>
				</div>	<!-- Close <div class="navbar-collapse collapse"> -->
				
			</div>	<!-- Close <div class="container"> -->
			
		</div>	<!-- Close <div class="nav navbar-default navbar-fixed-top"> -->




<div class="container-fluid" style="padding-top:100px;">

	<div class="container-fluid" style="width:80%;">
		<div class="jumbotron" style="background-image:url('images/contact-images/5590bdab0bf09.jpg'); color:white; border-radius:0px; padding:0px; padding-bottom:40px;">
				<br><br><br><br>
			<address style="padding:10px;">
			  <strong>Fiji, Inc.</strong><br>
			  120 MARINE DRIVE<br>
			  LAUTOKA, FIJI  94107<br>
			  <abbr title="Phone">P:</abbr> (123) 456-7890
			</address>
			
			<address style="padding:10px;">
			  <strong>David Trushkov</strong><br>
			  <a href="mailto:#" style="color:white;">davidisback4good@hotmail.com</a>
			</address>
				<br><br><br>
		</div>
	
	
	<br><br><br>

	<div class="col-md-4">
		
			<h2><strong>Contact Form</strong></h2>
				<br><br>
		<?php if(!empty($errors)) : ?>	
			<div class="panel">
				<ul>
					<li><?php echo implode('</li><li>', $errors); ?></li>
				</ul>
			</div>
		<?php endif; ?>
		
		<form action="contact_process.php" method="post">
			<div class="form-group">
				<label>Your Name*</label>
				<input type="text" name="name" class="form-control" <?php echo isset($fields['name']) ? ' value="' . e($fields['name']) . '"' : '' ?>>    
			</div>
			<div class="form-group">
				<label>Your email address*</label>
				<input type="text" name="email" class="form-control" <?php echo isset($fields['email']) ? ' value="' . e($fields['email']) . '"' : '' ?>>
			</div>
			
			<div class="form-group">
				<label>Your message*</label>
				<textarea name="message" class="form-control" rows="8"><?php echo isset($fields['message']) ? e($fields['message']) : '' ?></textarea>
			</div>
			
			<button type="submit" class="btn btn-success">Send</button>
				<br><br>		
			<p class="muted">* means a required filed</p>
				<br><br><br><br>
		</form>		
		
		</div>	<!-- Close col-md-4 -->
		
		
		
		
		<div class="col-md-4"></div>
		
		
		<div class="col-md-4">
			<center><img src="images/contact-images/website_71-slideshow_71709-turtle.jpg-BasicCrop-size-500x500.jpg" alt="Sea Turtle" class="img-circle img-responsive" style="width:75%;"></center>
				<br><br><br>
				<div class="caption">
					<p style="font-family:Raleway; font-size:20px; text-align:center;">Thank You for contacting us. We will reply to you as soon as possible.</p>
						<br><br><br><br>
				</div>
		</div>
		
		
		
	</div>
	
	

</div>

	<!-- Footer ----------------------------------------------------------------------------------------------------------------------------------------------------------->
		
		<div id="footer">
			<div class="container-fluid" style="padding:20px; width:80%;">
				<div class="row">
				
					<div class="col-sm-2">
						<div class="row">
							<ul class="list-unstyled">
								<li>
									<a href="//www.booked.net/weather/nadi-27036" target="_blank">
  									<img src="//w.bookcdn.com/weather/picture/28_27036_0_1_3498db_250_2980b9_ffffff_ffffff_1_2071c9_ffffff_0_3.png?scode=124&domid=w209" alt="Weather Icon"></a>
								</li>
							</ul>
						</div>
					</div>
					
					<div class="col-sm-10" id="icon-footer" style="padding-top:25px;">
							
							<a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook-square fa-4x">&nbsp;</i></a>
							<a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter-square fa-4x">&nbsp;</i></a>
							<a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus-square fa-4x">&nbsp;</i></a>
							<a href="https://instagram.com/" target="_blank"><i class="fa fa-instagram fa-4x">&nbsp;</i></a>
							<a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-square fa-4x">&nbsp;</i></a>									
							<!-- Go Up Icon -->
							<a href="#" style="float:right;"><i class="fa fa-arrow-circle-o-up fa-4x"></i></a>	
						
					</div>	
					
					
					<div class="col-md-6 pull-right">
						<a href="about.php" id="footer-service">Terms of Service&nbsp;&nbsp;</a>
						<a href="about.php" id="footer-service">Privacy&nbsp;&nbsp;</a>
						<a href="about.php" id="footer-service">About</a>
					</div>	
											
					
				</div>	<!-- Close div class="row">-->
			</div>	<!-- Close <div class="container"> -->
		</div>	<!-- Close footer -->
		
		
		
		<!-- Bottom Nav Footer -->
		
		<div class="navbar navbar-default navbar-bottom">
			<div class="container" style="width:80%">
			
				<div class="col-md-10" style="padding:0px;">
					<p class="navbar-text">Site Built by: David Trushkov</p>
				</div>
				
				<div class="col-md-2" style="padding:0px;">
					<a href="main_admin/login.php" class="navbar-text" style="text-decoration:none;">Admin</a>
				</div>
				
			</div>
		</div>
					


</body>

</html>

<?php
	unset($_SESSION['errors']);
	unset($_SESSION['fields']);
?>
