<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="description" content="Fiji Tourism website. Look through upcoming events and fiji articles. Look at activities you and your familty can do.">
<meta name="name" content="David Trushkov">

<title>Home Page</title>

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
<link href="images/logos/fiji_tourism_logo_detail.gif" rel="shortcut icon" type="image/vnd.microsoft.icon"/>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>

	<script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places,visualization"></script>
    <script type="text/javascript" src="js/google.js"></script>    

<!-- Font Awesome-->
<link href="assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- fotorama.css & fotorama.js. -->
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->

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
		
		
		
		
		
		<!-- Carousel-->
		
		<div id="myCarousel" class="carousel slide">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			
			<div class="carousel-inner">
			
				<div class="item active">
					<img src="images/body-backround.jpg" alt="Fiji" style=" background-size: cover;  no-repeat center center fixed; width:100%; height:100%;">
					<div class="container">
						<div class="carousel-caption" style="padding-bottom:475px;">
							<h1 style="padding-top:30px;">Welcome to Paradise</h1>
							<!--<p>Explore Fiji</p>-->												
						</div>
					</div>
				</div>
				
			
				<div class="item">
					<img src="images/body-backround-4.jpg" alt="Resort" style="background-size: cover;  no-repeat center center fixed; width:100%; height:100%;">
					<div class="container">
						<div class="carousel-caption" style="padding-bottom:475px;">
							<h1 style="padding-top:30px;">Luxury Resorts</h1>
						</div>
					</div>
				</div>

			
				<div class="item">
					<img src="images/body-backround-3.jpg" alt="Dinner" style=" background-size: cover;  no-repeat center center fixed; width:100%; height:100%;">
					<div class="container">
						<div class="carousel-caption" style="padding-bottom:400px;">
							<h1 style="padding-top:30px;">Dine</h1>
						</div>
					</div>
				</div>


			</div>	<!-- Close <div class="carousel-inner"> -->
			
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>

		</div>	<!-- Close <div class="carousel-inner"> -->
				
	
		
		
		<!-- Grid System -->
		
		<div class="container" style="padding:0px; width:80%;">
			
			<div class="container-fluid" style="background-color:#303030; padding:0px; padding-top:10px;">
				<div class="col-lg-6 col-md-12">
				<div class="page-header"><h2 style="color:white;">UPCOMING EVENTS</h2></div>
				</div>
					<div class="row">
					
						<div class="col-md-8">
							
								<div class="fotorama" data-nav="thumbs" data-loop="true" data-autoplay="true" data-autoplay="5000" data-allowfullscreen="true" data-thumbwidth="139px">
									<img src="images/events_slideshow/events.jpg" alt="Event" />
									<img src="images/events_slideshow/events2.jpg" alt="Event" />
									<img src="images/events_slideshow/events3.jpg" alt="Event" />
									<img src="images/events_slideshow/events4.jpg" alt="Event" />
									<img src="images/events_slideshow/events5.jpg" alt="Event" />
									<img src="images/events_slideshow/events6.jpg" alt="Event" />
									<img src="images/events_slideshow/events7.jpg" alt="Event" />
									<img src="images/events_slideshow/events8.jpg" alt="Event" />
								</div>
							
						</div>
						
						<div class="col-md-4" style="float:right;"><br><br><br><br><br><br><center><a href="upcoming_articles/index.php"><span class="ghost2-button-border-color">EVENTS</span></a>
						<h4 style="color:white; font-family: 'Raleway', sans-serif; font-weight: 500; line-height:25px;"><br>Stay up to date with all the current events happening in and around the Fiji area. Find out more about upcoming events by clicking here to see up to date
							Stay up to date with all the current events happening in and around the Fiji area.</h4></center></div>
							
					</div>	
						
			</div>	<!-- Close -->
			
			<br>
		
			<div class="row">
			
				<div class="col-md-3">
					<div class="thumbnail" style="border:none; border-radius:0px; padding:0px;">
						<img src="images/bottom-table/explore.jpg" alt="Island">
						<div class="caption">
							<h3>Accommodation</h3>
							<p>Your home away from home is referred to as your Bure. Our traditional Fijian villas are 
								separated by generous expanses and private beaches. An unrivaled private Fijian Island paradise awaits for you and your loved one.</p>
							<p><a href="#" class="btn btn-success" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Learn More</a></p>
						</div>
					</div>
				</div>
								<!-- Model -->
									<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-lg">
									    <div class="modal-content">
									    	<div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id=".bs-example-modal-lg">Accommodations</h4>
										     </div>
										     <div class="modal-body">
										     
										     		<div class="row">
										     		
										     			<div class="col-lg-4">
										     				<div class="thumbnail">
																<img src="images/bottom-table/accomendations-popup/beachhouse-resort.jpg" alt="Beach House Resort">
																<div class="caption">
																	<h4>Beachouse Fiji</h4>
																	<p>Beachouse is one of Fiji's best kept secrets! This relaxed beach retreat located on the Coral Coast provides a unique experience and is a favorite 
																	for both returnees and those new to Fiji.</p>
																	<p><a href="http://fijibeachouse.com/" class="btn btn-success">Visit Site</a></p>
																</div>
															</div>
										     			</div>
										     			
										     			<div class="col-lg-4">
										     				<div class="thumbnail">
																<img src="images/bottom-table/accomendations-popup/matanivusi-beach-resort.jpg" alt="Beach House Resort">
																<div class="caption">
																	<h4>MATANIVUSI BEACH ECO RESORT</h4>
																	<p>A hidden paradise on a white sandy beach with world class surf, hundred year old forests, romance, exploring, 
																	snorkeling and diving not far from your doorstep.</p>
																	<p><a href="http://surfingfiji.com/" target="_blank" class="btn btn-success">Visit Site</a></p>
																</div>
															</div>
										     			</div>
										     			
										     			<div class="col-lg-4">
										     				<div class="thumbnail">
																<img src="images/bottom-table/accomendations-popup/mana-resort.jpg" alt="Mana Resort">
																<div class="caption">
																	<h4>MANA ISLAND RESORT</h4>
																	<p>Mana Island Resort and Spa is 4 star Island Resort in Mamanuca Groups, Nestled on 300 acres of lush Tropical Gardens and surrounded by white sandy beaches 
																	and crystal clear coral waters.</p>
																	<p><a href="http://www.manafiji.com/" target="_blank" class="btn btn-success">Visit Site</a></p>
																</div>
															</div>
										     			</div>
										     			
										     			<div class="col-lg-4">
										     				<div class="thumbnail">
																<img src="images/bottom-table/accomendations-popup/lanivilla-resort.jpg" alt="Surfing Resort">
																<div class="caption">
																	<h4>LANI VILLA</h4>
																	<p>Private, exclusive accomodations for up to 10 people.  Our onsite staff are here ensure to your needs are catered to. Luxury villa 
																	estate in a resort setting.<br><br><br></p>
																	<p><a href="http://laniparadise.com/wordpress/fiji-villas/" target="_blank" class="btn btn-success">Visit Site</a></p>
																</div>
															</div>
										     			</div>
										     											     			
										     			<div class="col-lg-4">
										     				<div class="thumbnail">
																<img src="images/bottom-table/accomendations-popup/rendezvous-resort.jpg" alt="Surfing Resort">
																<div class="caption">
																	<h4>Rendezvous Fiji</h4>
																	<p>Rendezvous Fiji has one of the best access's to Fiji's world class breaks, Namotu, Restaurants. Not only are there daily surf trips 
																	available but fishing and snorkeling trips too.<br><br><br></p>
																	<p><a href="http://www.surfdivefiji.com/" target="_blank" class="btn btn-success">Visit Site</a></p>
																</div>
															</div>
										     			</div>
														
														<div class="col-lg-4">
										     				<div class="thumbnail">
																<img src="images/bottom-table/accomendations-popup/shangri-resort.jpg" alt="Shangri La Resort">
																<div class="caption">
																	<h4>SHANGRI-LA'S FIJIAN RESORT</h4>
																	<p>Shangri-La's Fijian Resort and Spa is exclusively located on private Yanuca Island. Only 45 minutes from Nadi International Airport, 
																	the resort is conveniently connected to the mainland by a causeway.</p>
																	<p><a href="http://www.shangri-la.com/" target="_blank" class="btn btn-success">Visit Site</a></p>
																</div>
															</div>
										     			</div>   			
										     											     			
										     		</div>	<!-- Close <div class="row"> -->
										     		
										     </div>	<!-- Close <div class="modal-body"> -->
										     
									     	 <div class="modal-footer">
        									 	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        									 </div>
									    </div>
									  </div>
									</div>
									<!-- Close Model -->				       
																       
							     										
				<div class="col-md-3">
					<div class="thumbnail"  style="border:none; border-radius:0px; padding:0px;">
						<img src="images/bottom-table/activities.jpg" alt="avatar">
						<div class="caption">
							<h3>Activities</h3>
							<p>Scuba dive, horseback ride on a beautiful beach, have a soothing “Lomi-Lomi” massage or just relax on your private beach, how you spend 
								your days in paradise is up to you.<br><br></p>
							<p><a href="activities.php" class="btn btn-success">Learn More</a></p>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="thumbnail" style="border:none; border-radius:0px; background-color:#F8F8F8; padding:0px;"><a href="things_to_do/index.php">
						<img src="images/bottom-table/20_things_to_do.jpg" alt="Hotel"></a>
						<div class="caption">
							<h3 id="h3_index"><a href="things_to_do/index.php">20 Things To Do</a></h3><br>
								<p id="things"><a href="things_to_do/index.php">
								&nbsp;&nbsp;Fiji lures visitors with its aquamarine waters and soft, warm sands that you'll find right outside the doors of your resort. In this setting, you can snorkel with manta rays in the Yasawas, 
								scuba dive near Taveuni, or party in the Mamanucas. But if you prefer something a bit tamer, you can visit a history museum or stop to smell the orchids at the Garden of the Sleeping Giant. 
								With so much to do, don't forget to lay back and relax—it's not every day that you're in Fiji.<br><br><br></a></p>
						</div>
					</div>
				</div>

			</div>	<!-- Close <div class="row"> -->
			
			
			
				<div class="row">
				
					<div class="col-md-6">
						<div class="embed-responsive embed-responsive-16by9">								
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/JRaakIL-N_s?rel=0&showinfo=0&autohide=1" allowfullscreen></iframe>
						</div>	
					</div>
					
					<div class="col-md-6" style="height:100%;">
						<div class="page-header">
							<h3 style="color:white;">The heart of the South Pacific, Fiji is blessed with 333 tropical islands that are home to happiness.</h3><br>
						</div>
						<p style="color:white;">For the perfect holiday, choose from affordable accommodation all the way through to exclusive 5 star resorts, bunk down in a hostel or book an island to yourself.
							Famous for its soft coral diving, white sand beaches and pristine natural environment Fiji is a leader in eco-tourism. For business travel there is no better place
							halfway between North America and Asia. Weddings and honeymoons in Fiji are a dream of a lifetime, and families and children have a special place here.</p>
						<br><br>
						<div style="padding-bottom:7%;">
							<center><a class="ghost-button-border-color" href="http://www.tripadvisor.com/HotelsList-Fiji-Luxury-Resorts-zfp4469.html" target="_blank">Visit Our Best Rated Hotels</a></center>
						</div>
					</div> 
						
			</div>	<!-- Close row -->
			
			<br>
									
			
			
			
			
			<!-- Accordion example -->
			<br><br>

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				         	Fiji's Culture
				        </a>
				      </h4>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
				      	<div class="row">
				      	<div class="col-md-7">
				      		<div class="thumbnail">
								<img src="images/drop-downs/culture.jpg" alt="culture">
							</div>
				        </div>
				        <div class="row">
  							<div class="col-md-4" style="font-family: 'Roboto', sans-serif; line-height:24px; ">
						        &nbsp;&nbsp;The Fijians are pretty easy-going, but if you are invited into a village, wear modest clothing and take off your hat (wearing one is an insult to the chief) when in the village. 
						        Leave your shoes outside the door when entering a home and keep in mind that it's also insulting to touch someone's head - which can be tempting when you are surrounded 
						        by wide-eyed, smiling children. If you are invited to drink kava, don't ask, just enjoy the ritual and the tumb noungue, sorry - the numb tongue.
								When visiting a village, it is customary to present a gift of kava, which is also known as 'yaqona'. The gift, (a "sevusevu"), will cost less than F$20 for a half kilo. 
								If you are accompanied by a guide, he/she will look after that. The sevusevu is presented to the traditional head of the village ("Turaga Ni koro"). 
								After it's been pounded into powder and mixed with water, it is usually served in the head person's house.		
					   		</div>
						</div>
					  </div>
				     </div>
				  </div>
				</div>			  
				  
				  
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingTwo">
				      <h4 class="panel-title">
				        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				         	Fiji's Food
				        </a>
				      </h4>
				    </div>
				    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				      <div class="panel-body">
				      	<div class="row">
				      		<div class="col-md-7">
								<div class="thumbnail">
									<img src="images/drop-downs/food.jpg" alt="Food">
										<div class="caption">
											<h6>Fiji is famous for their seafood. Their fish, prawn, lobster and cray cuisines are a culinary creator's dream. 
												If you have the chance, try the KOKODA (pron: CORE-CONDAA). It is fresh fish marinated in freshly squeezed lemon or lime juice and left to "cook" for 
												several hours. Freshly scraped and squeezed coconut milk is added after it is "cooked" together with finely diced tomatoes, spring onions, chillies and 
												with salt and pepper added to tantalise your tastebuds.  It is left in the fridge for an hour or two then served as an entrée.</h6>
										</div>
								</div>		 				 
				        	</div>
				        	<div class="row">
  								<div class="col-md-4" style="font-family: 'Roboto', sans-serif; line-height:24px; ">	
  									Traditional Fijian food is a wonderful amalgam of fresh, local ingredients found in the tropics and the traditional preparations and cooking methods passed down the 
  									generations. Coconut, fish, rice, taro, sweet potatoes, cassava and breadfruit are the main components in local Fijian dishes.<br>
  									&nbsp;&nbsp;The Fiji Islands are speckled with restaurants that serve traditional fare. Some noteworthy restaurants for local Fiji cuisine are Riley’s Restaurant in Suva, 
  									Makuluva Delights on Coast Road in Waiyevo and Bounty’s Bar and Restaurant in Nadi, whose specialty is palusami, which is fish or pork steamed with coconut milk and taro 
  									leaves. Old Mill Cottage Café in Suva is a popular spot among expats.<br>
  									&nbsp;&nbsp;As a significant portion of Fiji’s population is of Indian origin, Fiji’s cuisine also includes traditional Indian cooking. Suva’s metropolitan area has a host 
  									of choices for delicious, affordable Indian food, such as Maya’s Dhaba, which is famous for its wide array of Indian cooking – from Madrasi masala dosa to Punjabi tandoori 
  									chicken – and Curry House on Waimanu Road, which offers an all-you-can-eat vegetarian thali lunch. A favorite amongst locals is Tata’s Restaurant, an open-porch restaurant 
  									located in Nadi, across the street from an Indian temple.				
						    	</div>
							</div>
						
						</div>	<!-- Close <div class="row"> -->		       					
				      </div>	<!-- Close <div class="panel-body"> -->
				    </div>	<!-- Close <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo"> -->
				  </div>	<!-- Close <div class="panel panel-default"> -->
				  
				  
			  		<div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingThree">
					      <h4 class="panel-title">
					        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					          Travel to Fiji
					        </a>
					      </h4>
					    </div>
					    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					      <div class="panel-body">
					      	<div class="row">
					      		<div class="col-sm-12">
					      			<div class="thumbnail">
										<img src="images/drop-downs/travel-airplane.jpg" alt="Airplane">
										<div class="col-lg-8">
											<div class="caption">
												<h3>FIJI AIRWAYS</h3>
												<p style="font-family: 'Roboto', sans-serif; line-height:24px; ">Travel with us and make the most of your visit. Check our airfares and book your flight 
												to Fiji now! We live Fiji! We love Fiji! We are Fiji!</p>
												<p><a href="http://www.fijiairways.com/" target="_blank" class="btn btn-success">Learn More</a></p>
											</div>
										</div>
									</div>
					      		</div>
					      		<div class="col-sm-12">
					      			<div class="thumbnail">
										<img src="images/drop-downs/travel-cruise.jpg" alt="Cruise Line">
										<div class="col-lg-8">
											<div class="caption">
												<h3>FIJI CRUISE</h3>
												<p style="font-family: 'Roboto', sans-serif; line-height:24px; ">With pristine white beaches and crystal clear warm waters, one can only imagine the host of 
												watersports available in and around Suva, Fiji. Venture to Bega Divers Fiji, a short drive outside the city and a team of experts can take you diving in the 
												Bega Lagoon. For those yearning to catch the big waves, there is a surf break near the Suva lighthouse. Sailing is also a popular activity in Suva, with the 
												Royal Suva Yacht Club located in Suva Harbor at Korovou</p>
												<p><a href="http://www.royalcaribbean.com/findacruise/ports/group/home.do?portCode=SUV" target="blank" class="btn btn-success">Learn More</a></p>
											</div>
										</div>
									</div>
					      		</div>
					      		
					      	</div>
					      </div>
					    </div>
					  </div>
					  	 	  
				</div>	<!-- Close <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"> -->
			
			</div>	<!-- Close <div class="container"> -->
			
		<br><br>
		
		<!-- Google Map -->
			
		<div class="row">
			<div class="col-md-1" style="float:left;"></div>
	  			<div class="col-sm-10">
	  				<div id="map-canvas"></div>
	  			</div>
  			<div class="col-md-1" style="float:right"></div>
  		</div>
  						
		<br><br><br><br>
	
	
	
	
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



