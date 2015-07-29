<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<title>Activities Page</title>

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  
  	<!-- Slidehover jQuery plugin. -->
  	<script src="js/jquery.sliphover.min.js" type="text/javascript"></script>
	<script src="js/slip-hover.js" type="text/javascript" ></script> 


<!--[if lt IE 9]>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<![endif]-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-custom.css">
<link href="comment/css/reset.css" rel="stylesheet" type="text/css">
<link href="comment/css/style.css" rel="stylesheet" type="text/css">

<link href="images/logos/fiji_tourism_logo_detail.gif" rel="shortcut icon" type="image/vnd.microsoft.icon"/> 

<!-- Font Awesome-->
<link href="assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

<script>

	function commentSubmit() {
		//exit if one of the field is blank
		if(form1.name.value == '' && form1.comments.value == '') {
			alert('Enter your message !');
			return;
		}
		
		var name = form1.name.value;
		var comments = form1.comments.value;
		
		//http request instance
		var xmlhttp = new XMLHttpRequest();
		
		//display the content of insert.php once successfully loaded
		xmlhttp.onreadystatechange = function() { 
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				// the chatlogs from the db will be displayed inside the div section
				document.getElementById('comment_logs').innerHTML = xmlhttp.responseText;
			}
		}
		
		xmlhttp.open('GET', 'comment/insert.php?name='+name+'&comments='+comments, true); //open and send http request
		xmlhttp.send();
	}
	
		$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			setInterval(function() {
				$('#comment_logs').load('comment/logs.php');}, 2000);
		});
		
</script>

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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Activities<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#Surfing">Surfing</a></li>
								<li><a href="#Snorkeling">Snorkeling</a></li>
								<li><a href="#Diving">Diving</a></li>
								<li><a href="#Boating">Boating</a></li>
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
		
		
		
	<!-- Page Content --------------------------------------------------------------------------------------------------------------------------------------------------------->		
					
		<div class="jumbotron" style="background-image:url('images/activities-gallery/header_backround.jpg')">
			<div class="container-fluid">
				<div class="caption"><p><h2 style="font-family:'Microsoft Yi Baiti'; font-size:62px; padding-left:10%;">Fiji Activities</h2></p></div>
			</div>
		</div>
			
			
		<div class="container-fluid" style="width:80%;">
		
			<div class="page-header" id="Surfing">
				<h2 style="font-family:KaiTi;">Surfing</h2>
			</div>
			<br>
			
			
			
			<center>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
				  </ol>
				
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				  
				    <div class="item active">
				      <img src="images/activities-gallery/surfing-gallery/surfing_1.jpg" alt="Fiji Surfing Picture">
				      <div class="carousel-caption">
				        <!-- Text goes here. -->
				      </div>
				    </div>
				    
				    <div class="item">
				      <img src="images/activities-gallery/surfing-gallery/surfing2.jpg" alt="Fiji Surfing Picture">
				      <div class="carousel-caption">
				        <!-- Text goes here. -->
				      </div>
				    </div>
				    
				    <div class="item">
				      <img src="images/activities-gallery/surfing-gallery/surfing3.jpg" alt="Fiji Surfing Picture">
				      <div class="carousel-caption">
				        
				      </div>
				    </div>	
				    
					<div class="item">
				      <img src="images/activities-gallery/surfing-gallery/surfing4.jpg" alt="Fiji Surfing Picture">
				      <div class="carousel-caption">
				        <!-- Text goes here. -->
				      </div>
				    </div>	    
				    
				  </div>
				
				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
			</center>
			
			
			
			<div class="row">
			
				<div class="col-md-4">
					<div class="page-header"><p style="font-size:18px;">WINTER SURFING IN FIJI</p></div>
						<p>Fiji's winter runs from April through October. This is the time of year that low-pressure systems build in the Southern Hemisphere, south of New Zealand, 
							and send consistently huge swells toward Fiji. Surf conditions can range as high as 8-10 feet with 12-20 foot faces. <br><br>Winter is the best time of year for 
							experienced surfers to surf Fiji.
						</p>
				</div>
				
				<div class="col-md-4">
					<div class="page-header"><p style="font-size:18px;">SURFING GUIDE</p></div>
						<p>Everyone wants to know the best time of year to visit Fiji. The answer is: it depends. Fiji has wonderful, tropical weather all year round with air and water temperatures in 
							the mid-70's to mid-80's Fahrenheit, but there are two distinct surfing seasons in Fiji. The winter "cool" season produces the biggest waves, while the summer "warm" season has shorter 
							swells and lighter winds. <br><br>The type of Fiji surf that you're looking for will determine what the best time of year to visit is.
						</p>
				</div>
				
				<div class="col-md-4">
					<div class="page-header"><p style="font-size:18px;">SUMMER SURFING IN FIJI</p></div>
						<p>November through March is warmer, wetter, and more humid. Swells are shorter in duration, winds are lighter, and the weather is hotter. Expect glassy water and afternoon showers.
							<br><br>Less experienced surfers will have an easier time surfing in Fiji during the summer, but don't let the smaller waves fool you. Surfing in Fiji takes skill and confidence 
							in your abilities, and comfort in the water. The breaks are all over coral reefs, which are not the best place for beginners to learn to surf in Fiji.					
						</p>
				</div>
				
			</div>	<!-- Close row -->
			
			
			<br><br>
			
			
			<div class="row">
				
				<div class="col-md-6">
					<div class="embed-responsive embed-responsive-16by9">			
						<center><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MaCrQNtb6FM?rel=0&showinfo=0&autohide=1" allowfullscreen></iframe></center>
					</div>
				</div>
					
				<div class="col-md-6">
					<div class="embed-responsive embed-responsive-16by9">
						<center><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/aeS7rxSjXbY?rel=0&showinfo=0&autohide=1" allowfullscreen></iframe></center>
					</div>
				</div>
					
			</div>	<!-- Close row -->
					
			<br><br><br>	
			
		</div> <!-- Close container-fluid -->



			<!-- Start Snorkling Section -->
			
			<div  class="container-fluid" style="width:80%;">
			
				<div class="page-header" id="Snorkeling">
					<h2 style="font-family:KaiTi;">Snorkeling</h2>
				</div>

				<div class="col-sm-12" style="padding-bottom:50px;">
				
					<div class="row" style="padding:0px;">
					
						<div class="col-md-5" style="padding-top:20px;">
						  	<div class="embed-responsive embed-responsive-16by9">
						    	<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/azLBObjYzLM?rel=0&showinfo=0&autohide=1" allowfullscreen></iframe>
						  	</div>
						</div>		
		
						<div class="col-lg-7" style="padding-top:20px;">
							<p style="font-size:18px;">Fiji is known as the “Soft Coral Capital of the World” and is also home to the “Great Astrolabe Reef”. A network of brilliant coral reefs surrounds our 333 islands and atolls. 
								With around 1000 species of fish and several hundred types of coral and sponges, Fiji offers a unique diving experience. With over 4000 square miles of coral reef, Fiji Islands offer 
								divers unparalleled marine biodiversity.<br><br>Diving and Snorkeling
								Fiji is known as the “Soft Coral Capital of the World” and is also home to the “Great Astrolabe Reef”. A network of brilliant coral reefs surrounds our 333 islands and atolls. With around 
								1000 species of fish and several hundred types of coral and sponges, Fiji offers a unique diving experience. With over 4000 square miles of coral reef, Fiji Islands offer divers 
								unparalleled marine biodiversity. If you feel like going beyond the beautiful reef dives venture into reef passages and come face to face with Grey Reef sharks, Silvertips, Hammerheads 
								and White Tips. If you’d like to get to know them a bit better and at closer range, expect an adrenalin rush from what is known as the ‘Best shark dive in the world’ as you dive with the 
								sharks observing experienced Fijian divers carry out the famous ‘shark feeding.<br><br>If you’re looking for an amazing experience at a slightly slower pace, you can swim with the giant 
								Manta Rays. Between May and October these elegant creatures bless the waters off Manta Ray Island with a visit, MantaRays are one of the largest fish in the ocean, some span as big as 
								6.5metres. Fiji is also home to five species of turtles, the most famous being the Hawksbill Turtle, which are now aprotected species. Many of the resorts now have conservation programs 
								to look after these precious locals. Our moderate water temperature makes for year-round diving and the visibility is a photographers dream.
								<br><br><br><br>
							</p>
						</div>
						
					</div>	<!-- Close row -->
					
				</div>	<!-- Close col-sm-12 -->
				
				
				
				<div class="page-header" id="Diving">
					<h2 style="font-family:KaiTi;">Diving</h2>
				</div>


				<div class="container-fluid">
					<iframe src="https://www.google.com/maps/d/embed?mid=zwem1yf0SOOg.kiRqqMqToRnU" width="100%" height="500px"></iframe>
				</div>
					

			
				<div class="container-fluid">
							
					<br><br><br>			
						
					<div class="jumbotron" style="border-radius:0px; background-image:url('images/diving-sites/diving-banner.jpg');">
						<h2><b>Divivng Spots&nbsp;&nbsp;<small>Located in the Malolo Barrier Reef</small></b></h2>
					</div>												
			
							
					<div class="row">
						
						
							<div class="col-md-3">
								<div class="thumbnail" id="pic1" style="border:0px; border-radius:0px; padding:0px;">
									<img src="images/diving-sites/Gotham-City2.jpg" alt="Gothom City Diving Spot" title="Diving outside the Malolo Barrier Reef">
										<div class="caption"><h3 style="font-family: 'Open Sans', sans-serif; font-weight:700;">Gotham City</h3>
											<p style="font-family: 'Open Sans', sans-serif; font-weight:400;">Three pinnacles situated in a passage in the outer Barrier Reef where fish and corals are in incredible abundance. Famed for providing the unusual, 
												Gotham City never disappoints. The soft corals are every colour of the rainbow.</p>
										</div>
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="thumbnail" id="pic2" style="border:0px; border-radius:0px; padding:0px;">
									<img src="images/diving-sites/wilkes-passage.jpg" alt="Barrel Head Diving Spot" title="Diving inside the Malolo Barrier Reef">
										<div class="caption"><h3 style="font-family: 'Open Sans', sans-serif; font-weight:700;">Barrel Head</h3>
											<p style="font-family: 'Open Sans', sans-serif; font-weight:400;">A large pinnacle rising up from in excess of 60 metres. Excellent hard corals and sea fans are observed here, 
												along with resident reef sharks and turtles. This site can produce the unexpected – large sharks, schools of Yellow Fin tuna and other pelagic species.</p>
										</div>
								</div>
							</div>
	
	
							<div class="col-md-3">
								<div class="thumbnail" id="pic3" style="border:0px; border-radius:0px; padding:0px;">
									<img src="images/diving-sites/Castaway-wall.jpg" alt="Cast Away Diving Spot" title="Diving outside the Malolo Barrier Reef">
										<div class="caption"><h3 style="font-family: 'Open Sans', sans-serif; font-weight:700;">Castaway Passage</h3>
											<p style="font-family: 'Open Sans', sans-serif; font-weight:400;">A gap in the outer Barrier Reef that allows large volumes of ocean water to enter the lagoon. Diving in this passage 
												almost always produces fantastic visibility (30 metres plus). Like a number of our other dives, this site will frequently produce the unexpected.</p>
										</div>
								</div>
							</div>
							
							<div class="col-md-3">
								<div class="thumbnail" id="pic4" style="border:0px; border-radius:0px; padding:0px;">		
										<img src="images/diving-sites/tuis-reef.jpg" alt="Tuia Reef Diving Spot" title="Diving inside the Malolo Barrier Reef">
										<div class="caption"><h3 style="font-family: 'Open Sans', sans-serif; font-weight:700;">Tui’s Reef</h3>
											<p style="font-family: 'Open Sans', sans-serif; font-weight:400;">An easy dive in 18 metres of water or less on a series of pinnacles close to Beachcomber Island. Often used for night 
												diving where divers frequently observe Crayfish, Clams, Moray Eels and a multitude of other tropical marine life.</p>
										</div>
								</div>
							</div>

						
					</div>	<!-- Close row -->
				
				</div>	<!-- Close container -->
				
								
				<br><br><br><br>
				
				
				
				<!-- Start Boating Section -->
				
				<div class="page-header" id="Boating">
					<h2 style="font-family:KaiTi;">Boating</h2>
				</div>
	

				<div class="col-lg-12" style="padding-top:20px;">
										
					<div class="col-sm-3">
						<div class="thumbnail">
							<img src="images/activities-gallery/boating-activities/excitor_fiji.jpg" alt="Speed Boating">
							<div class="caption">
						        <h4>EXCITOR FIJI</h4>
						        <p>Excitor is the fastest boat of its size and kind in Fiji and definitely not to be missed whilst on holiday in Fiji! Offering unique high-speed tours and transfers around 
						        	Port Denarau and the Mamanuca Islands.Excitor is available for passengers to experience some of the finest tropical islands and locations in Fiji.<br><br><br></p>
						        <p><a href="http://www.excitorfiji.com/" target="_blank" class="btn btn-success" role="button">Visit Site</a></p>
						    </div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="thumbnail">
							<img src="images/activities-gallery/boating-activities/fiji_premire_liveaboard.jpg" alt="Boating">
							<div class="caption">
						        <h4>NAI'A FIJI</h4>
						        <p>NAI'A is 120 feet of air-conditioned luxury, custom-built to offer Fiji’s finest diving. Family-owned and operated, NAI'A boasts 12 dedicated crew who understand discerning 
						        	divers and share their passion for adventure, exploration and great company! Join the luxury vessel NAI'A for world-class live-aboard diving adventures throughout the alluring 
						        	Fiji Islands.<br><br></p>
						        <p><a href="http://www.naia.com.fj/" target="_blank" class="btn btn-success" role="button">Visit Site</a></p>
						    </div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="thumbnail">
							<img src="images/activities-gallery/boating-activities/explorer_day_cruise.jpg" alt="Boating">
							<div class="caption">
						        <h4>SOUTH SEA CRUISES</h4>
						        <p>South Sea Cruises is Fiji’s leading maritime operator offering a range of Day Cruises & Resort Connections in the Fiji Islands. Sail the Mamanuca Islands on a classic schooner, 
						        	visit an island paradise for the day or cruise the Mamanucas & Yasawas on a high-speed catamaran.<br><br><br></p>
						        <p><a href="http://www.ssc.com.fj/" target="_blank" class="btn btn-success" role="button">Visit Site</a></p>
						    </div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="thumbnail">
							<img src="images/activities-gallery/boating-activities/Adrenalin Fiji_Hobie Cat Sailing_racing_0.jpg" alt="Boating">
							<div class="caption">
						        <h4>HOBIECAT SAILING WITH ADRENALIN</h4>
						        <p>Try hobie cat sailing for a non-motorized activity. Enjoy the peaceful surround of the beach from the water while sailing offshore from your Denarau Resort. 
						        	Learn a new skill on your holiday and book a lesson!<br><br><br><br><br></p>
						        <p><a href="http://www.adrenalinfiji.com/" target="_blank" class="btn btn-success" role="button">Visit Site</a></p>
						    </div>
						</div>
					</div>

				
			</div>	<!-- Close col-lg-8 -->
								
		</div>	<!-- Close contanier -->
					
			
		<!-- Comment section --->
			
		<div class="container-fluid" style="width:80%;">
		
			<br><br><br>
			
			<div class="page_content">
			   	<h4>Comment Section</h4>
			</div>
			
			<div class="row">
				<div class="col-md-12">
				
					<div class="col-md-6">	
					     <form name="form1" style="padding-left:10%">
						     <div class="form-group">
						     	<label>Name:</label>
						     	<input type="text" class="form-control" name="name" placeholder="Name..." style="width:70%;">
						     	<br>
						     </div>
						     	<label>Comment:</label>
						    	<textarea class="form-control" name="comments" placeholder="Leave Comments Here..." rows="4"  style="width:70%;"></textarea>
						        <br><br>
						        <a href="#" onClick="commentSubmit()" class="btn btn-success">Post Comment</a><br>
					     </form>
					 </div>
					 
					<div class="col-md-8">
						<div id="comment_logs">
							Loading comments...
						</div>
					</div>
					
				</div>	<!-- Close col-md-12 -->
			</div>	<!-- Close row -->
			
		</div>	<!-- Close container -->
		
		
		
		
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
		
		
