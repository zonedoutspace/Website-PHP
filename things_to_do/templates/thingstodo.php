<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<title>Things To Do</title>

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
<link href="../../images/logos/fiji_tourism_logo_detail.gif" rel="shortcut icon" type="image/vnd.microsoft.icon"/>

	<script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places,visualization"></script>
    <script type="text/javascript" src="../js/google.js"></script>   
     
<!-- fotorama.css & fotorama.js. -->
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>

<!-- Font Awesome-->
<link href="../assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body style="background-color:#303030;">		
		
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
					<ul class="nav navbar-nav" style="float:right; padding-right:50px;">	
						<li><?php 
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

		<!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

		<div class="container" id="main-container">
		
		<div class="jumbotron" id="jumbotron-css">
			<div class="page-header" id="page-header-main"><h2 id="h2-page-header">THINGS TO DO</h2></div>
		</div>
		
		<div class="col-md-12" id="top-banner">
			<div class="fotorama" data-nav="thumbs" data-loop="true" data-autoplay="true" data-autoplay="5000" data-allowfullscreen="true" data-thumbwidth="140px" >
				<img src="images/things_to_do_banner/1.jpg" alt="Hiking" />
				<img src="images/things_to_do_banner/2.jpg" alt="School Of Fish" />
				<img src="images/things_to_do_banner/3.jpg" alt="Turtle On Beach" />
				<img src="images/things_to_do_banner/4.jpg" alt="Beach" />
				<img src="images/things_to_do_banner/5.jpg" alt="Mountain View" />
				<img src="images/things_to_do_banner/6.jpg" alt="Surfing In Fiji" />
				<img src="images/things_to_do_banner/7.jpg" alt="Eating Out" />
				<img src="images/things_to_do_banner/8.jpg" alt="Lizard" />
				<img src="images/things_to_do_banner/9.jpg" alt="Golfing In Fiji" />
				<img src="images/things_to_do_banner/10.jpg" alt="Massage" />
				<img src="images/things_to_do_banner/11.jpg" alt="Resort Fiji" />
			</div>
		</div>
		
		
			
		<?php foreach ( $results['articles'] as $article ) { ?>
					
			<div class="row" id="main-row">

				<div class="col-md-12">

					
					<div class="col-md-3" style="padding-top:20px;">					     	
					     <!-- Image path goes here -->
					     <?php if ( $imagePath = $article->getImagePath( IMG_TYPE_THUMB ) ) { ?>
							<img src="<?php echo $imagePath?>" alt="Article Thumbnail" />
						<?php } ?>        
					</div>
						<br><br>					
					<div style="width:75%; padding-left:15px;"><b><?php echo htmlspecialchars( $article->title )?></b></div>	 	
					<br>				    	
					<div class="col-md-4"><p style="font-family: 'Open Sans', sans-serif; font-weight: 400; line-height:30px;">		            
						<?php echo htmlspecialchars( $article->content )?></p>
							<br><br><br><br>
						<p style="font:8px;"><i>Published On: <?php echo date('F j, Y', $article->publicationDate)?></i></p>
					</div>						
				
				
				</div>	<!-- Close col-md-12 -->
			
			</div>	<!-- Close row -->	
					
				<br><br><br><br>  
				     
		<?php } ?>
					
      	            
      </div>	<!-- Close container -->
           
      
      
       <!--####################### COMMENTING SYSTEM #######################-->
        
        <div class="container" id="bottom-container">
        
	        <?php
	
				include 'comments.class.php';
				
				
				$db_details = array(
					'db_host' => 'localhost',
					'db_user' => 'david_db',
					'db_pass' => 'd16331633',
					'db_name' => 'fiji'
					);
				
				$page_id = 1;
				
				$comments = new Comments_System($db_details);
				
				$comments->grabComment($page_id);
				
				
				if ($comments->success)
				
					echo "<div class='alert alert-success' id='comm_status'>".$comments->success."</div>";
					
				else if ($comments->error)
				
					echo "<div class='alert alert-error' id='comm_status'>".$comments->error."</div>";
					
				
				// a simple form
				echo $comments->generateForm();
				
				// we show the posted comments
				echo $comments->generateComments($page_id); // we pass the page id
				
			
			?>  
		
		</div>	<!-- Close bottom container -->      

      
      
      
      
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
						<a href="../about.php" id="footer-service">Terms of Service&nbsp;&nbsp;&nbsp;&nbsp;</a>
						<a href="../about.php" id="footer-service">Privacy&nbsp;&nbsp;&nbsp;&nbsp;</a>
						<a href="../about.php" id="footer-service">About</a>
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
					<a href="admin.php" class="navbar-text" style="text-decoration:none;">Admin</a>
				</div>
				
			</div>
		</div>



</body>

</html>
