<?php
	require_once('db_connect.php');
	require_once('data_valid_fns.php');
	require_once('login_functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<title>Login</title>

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
			 					{ echo 'Could not log you in.<br />'; } else  { echo '<a href="register_form.php"><button type="button" class="btn btn-primary">Register</button></a>'; } }
			 				?>
						</li>	
						<li><?php 
								if (isset($_SESSION['valid_user'])){ echo '<a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>'; } else { if (isset($userid))
			 					{ echo 'Could not log you in.<br />'; } else  { echo '<a href="login_form.php"><button type="button" class="btn btn-success">Login</button></a>'; } }
			 				?>
			 			</li>
					</ul>
				</div>	<!-- Close <div class="navbar-collapse collapse"> -->
				
			</div>	<!-- Close <div class="container"> -->
			
		</div>	<!-- Close <div class="nav navbar-default navbar-fixed-top"> -->
		
		
		<div class="container" style="padding-top:100px;">
			<div class="row">
				<div class="col-sm-6">
					<div class="page-header"><b>Login</b></div>
				</div>
				<div class="col-md-12">
					
					<form method="post" action="member.php">
					  <div class="form-group">
					    <label>Username</label>
					    <input type="text" class="form-control" name="username" placeholder="Enter username" style="width:50%">
					  </div>
					  <div class="form-group">
					    <label>Password</label>
					    <input type="password" class="form-control" name="passwd" placeholder="Password" style="width:50%">
					  </div>
					  <button type="submit" class="btn btn-default">Submit</button>
					</form>		
					
					<br><br>
					
					<!-- Button trigger modal -->
						<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
						  Forgot Password?
						</button>
						
						<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Forgot Password Form</h4>
						      </div>
						      <div class="modal-body">
						      
						      	<form action="forgot_password.php" method="post">
									<div class="form-group">
								    	<label>Enter Your Username</label>
								    	<input type="text" class="form-control" name="username" placeholder="Enter username" style="width:50%">
								  	</div>
								  	<button type="submit" class="btn btn-default">Change Password</button>
								</form>
  
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>	
						
					
				</div>
			</div>
		</div>
		
		
		
		
		

</body>

</html>
