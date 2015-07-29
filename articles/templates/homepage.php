<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<title>Article Page</title>

<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<![endif]-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../css/main.css"> 
<link rel="stylesheet" type="text/css" href="style.css" />
<link href="../images/logos/fiji_tourism_logo_detail.gif" rel="shortcut icon" type="image/vnd.microsoft.icon"/>   

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>

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
						<li><a href="index.php">Articles</a></li>
						<li><a href="../upcoming_articles/index.php">Events</a></li>
						<li class="dropdown">
							<a href="../../activities.php" class="dropdown-toggle" data-toggle="dropdown">Activities<b class="caret"></b></a>
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

<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

		<div class="rounded" style="padding-top:60px;">
		  <img src="../images/article/article-backround.jpg" style="width:100%">
		  <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
		</div>
			

		<div class="bs-docs-header" id="content" tabindex="-1" style="background-color: #6f5499;">
			<div class="container">
				<h2 style="color:white;">Fiji News & Articles<br><h5 style="color:white;">Articles based on the daily life<br> of Fiji and its people.<br><br></h5></h2>
			</div>
		</div>
		
		
		
		
		<div class="container-fluid" style="width:80%;">
		
			<br><br>
				
			<div class="row">
				<div class="col-md-6" style="padding:0px;">
				
					<!-- start feedwind code --><script type="text/javascript">document.write('\x3Cscript type="text/javascript" src="' + ('https:' == document.location.protocol ? 'https://' : 'http://') + 
					'feed.mikle.com/js/rssmikle.js">\x3C/script>');</script><script type="text/javascript">(function() {var params = {rssmikle_url: "http://www.fijitimes.com/rss.aspx?section=local",
					rssmikle_frame_width: "300",rssmikle_frame_height: "400",frame_height_by_article: "0",rssmikle_target: "_blank",rssmikle_font: "Arial, Helvetica, sans-serif",rssmikle_font_size: "12",
					rssmikle_border: "off",responsive: "on",rssmikle_css_url: "",text_align: "left",text_align2: "left",corner: "off",scrollbar: "on",autoscroll: "on",scrolldirection: "up",scrollstep: "3",
					mcspeed: "20",sort: "Off",rssmikle_title: "on",rssmikle_title_sentence: "",rssmikle_title_link: "",rssmikle_title_bgcolor: "#9ACD32",rssmikle_title_color: "#FFFFFF",rssmikle_title_bgimage: 
					"",rssmikle_item_bgcolor: "#FFFFFF",rssmikle_item_bgimage: "",rssmikle_item_title_length: "55",rssmikle_item_title_color: "#0066FF",rssmikle_item_border_bottom: "off",
					rssmikle_item_description: "on",item_link: "off",rssmikle_item_description_length: "150",rssmikle_item_description_color: "#666666",rssmikle_item_date: "gl1",rssmikle_timezone: 
					"Etc/GMT",datetime_format: "%b %e, %Y %l:%M:%S %p",item_description_style: "html",item_thumbnail: "full",item_thumbnail_selection: "auto",article_num: "15",rssmikle_item_podcast: 
					"off",keyword_inc: "",keyword_exc: ""};feedwind_show_widget_iframe(params);})();</script><div style="font-size:10px; text-align:center; "><a href="http://feed.mikle.com/" target="_blank" 
					style="color:#CCCCCC;">RSS Feed Widget</a><!--Please display the above link in your web page according to Terms of Service.--></div>
					
				</div>
				
				<div class="col-md-1"></div>
				
				<div class="col-md-5">
					
					<div class="page-header"><h3>ARTICLES</h3></div>
				
					<?php foreach ( $results['articles'] as $article ) { ?>
						<div id="side-articles">
							<li>
								<ul><a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a></ul>
							</li>
						</div>
					<?php } ?>	
				
				</div>
				
			</div>
			
			<br><br><br><br><br>
			
					<?php foreach ( $results['articles'] as $article ) { ?>
					<br><br>
						<div class="row">	
							<div class="col-md-12">
							
					       	
								<div class="col-md-2">
									<?php
						            	if ( $imagePath = $article->getImagePath( IMG_TYPE_THUMB ) ) { ?>
						              	<a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>"><img class="articleImageThumb" src="<?php echo $imagePath?>" alt="Article Thumbnail" /></a>
						            <?php } ?>
								</div>	
								
			          			<br>
			          			
				          		<div class="col-md-4">					
										<div style="width:75%; padding-left:15px;"><p style="font-size:20px;"><b><?php echo htmlspecialchars( $article->title )?></b></p></div>	 	
								<br>
									
						        <p style="font-family: 'Open Sans', sans-serif; font-weight: 400; line-height:30px;">					         			            	
						        	<?php echo htmlspecialchars( $article->summary )?>	
						        </p>
						                  	
						          	<br><br><br>
						            <p style="font-size:16px; font-style:italic;">Published on:  <?php echo date('j F', $article->publicationDate)?></p>   	
						        </div>
					        	
					
							</div>	<!-- Close col-md-12 -->          
						</div>	  <!-- Close row-->   
			   			<br><br><br>	
					<?php } ?>		
									
				<br>
			
			<p><a href="./?action=archive">Article Archive</a></p>
			  
   		      
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
		

		


