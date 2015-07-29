<?php

	function display_login_form() {
  	// dispaly form asking for name and password
  	
?>

<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<title>Admin Login</title>

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<body>

<div class="container" style="padding-top:200px;">

	<div class="col-md-6" style="float:left; background-color:#eee; border-radius:2%;">
	<br>
	<h3><span class="label label-success">Admin Login</span></h3>
	<br><br>
		<form method="post" action="admin.php">
			 <div class="form-group">
			   <label>Username</label>
			   <input type="text" name="username" class="form-control" placeholder="Username">
			 </div>
			 <div class="form-group">
			  <label>Password</label>
			  <input type="password" name="passwd" class="form-control" placeholder="Password">
			 </div>
			  <button type="submit" class="btn btn-default">Login</button>
		</form>
	</div>
		
		
</div>
	
	
 
</body>
</html>

<?php
}
	function display_admin_menu() {
	
?>

<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<title>Main Admin Menu</title>

<script src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<!--[if lt IE 9]>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<![endif]-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="boat-css.css">
<link href="../images/logos/fiji_tourism_logo_detail.gif" rel="shortcut icon" type="image/vnd.microsoft.icon" >

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="../assets/font-awesome-4.3.0/css/font-awesome.min.css">

</head>

<body>


	<div class="container-fluid" style="background-color:#313131; padding-top:100px;">
		<div class="col-md-1"><div class="thumbnail" style="border-radius:0px;"><a href="../index.php"><img src="../images/logos/logo.png" alt="Fiji Flower Logo"></a></div></div>
		<div class="col-md-4">
			<div class="page-header"><h1 style="color:white;">MAIN ADMIN MENU</h1></div>
		</div>
	</div>
	
		<br><br><br>
	
	<div class="container" style="width:80%; padding-bottom:100px; height:700px;">	
		
		<div class="row">
		
			<div class="col-md-4">
				<div id="article1">
  					<p>
  						<center><a href="../articles/admin.php"><i class="fa fa-pencil fa-5x"></i></a></center>
  					</p>
  
  					<span id="article1-element">
  						<center><p>Articles Admin Login</p></center>
  					</span>
				</div>
			</div>
			
			<div class="col-md-4">
				<div id="article2">
  					<p>
  						<center><a href="../upcoming_articles/admin.php"><i class="fa fa-pencil fa-5x"></i></a></center>
  					</p>
  
  					<span id="article2-element">
  						<center><p>Upcoming Events Admin Login</p></center>
  					</span>
				</div>
			</div>


			<div class="col-md-4">
				<div id="article3">
  					<p>
  						<center><a href="../things_to_do/admin.php"><i class="fa fa-pencil fa-5x"></i></a></center>
  					</p>
  
  					<span id="article3-element">
  						<center><p>Things To Do Admin Login</p></center>
  					</span>
				</div>
			</div>			
			
		</div>	<!-- Close row -->
		
		
		<div class="row">
		
			<div class="col-md-4"></div>			
			
			<div class="col-md-4" style="padding-top:100px;">	
				<div id="logout">
  					<p>
  						<center><a href="logout.php"><i class="fa fa-pencil fa-5x"></i></a></center>
  					</p>
  					<span id="logout-element">
  						<center><p>LOGOUT</p></center>
  					</span>
				</div>				
			</div>
			
			<div class="col-md-4"></div>
			
		</div>	<!-- Close row -->		
		
	</div>	<!-- Close container -->
	
	
	
	
	
	
	
	
	<div class="container" style="width:80%; padding-bottom:100px;">
		
		<br><br><br><br><br><br><br>	
			
			
			
			
			<div class="col-md-6">
			
				<div class="caption"><h3>Registered Users</h3></div><br><br>
			
				<table class="table table-hover">
		
					<thead>
						<tr>
							<th width="6%" align="left">Email</th>
							<th width="7%" align="left">Name</th>
							<th width="7%" align="left">Username</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
							$conn = db_connect();
		
							$select = "select email, name, username from login";
							$query = $conn->query($select);
							
							if ($query->num_rows > 0) {
							    
							    while ($row = $query->fetch_assoc()) {  
							    
									echo "<tr>";
										echo "<td>";
											echo "<a href='mailto: '>" . $row["email"] . "</a>";
										echo "</td>";
										echo "<td>";
											echo $row["name"];
										echo "</td>";
										echo "<td>";
											echo $row["username"];
										echo "</td>";
									echo "</tr>";
									
								}
									
							} else {
								echo "0 results";
							}
	
						?>
					</tbody>
					
				</table>
				
			</div>	
						
			
				
	</div>	<!-- Close container -->
	
	

</body>
</html>

<?php
}

	function display_button($target, $image, $alt) {
	
	  echo "<div align=\"center\"><a href=\"".$target."\"><img src=\"images/".$image.".gif\" alt=\"".$alt."\" border=\"0\" height=\"50\" width=\"135\"/></a></div>";
	}
	
	
	
	function display_form_button($image, $alt) {
	
	  echo "<div align=\"center\"><input type=\"image\" src=\"images/".$image.".gif\" alt=\"".$alt."\" border=\"0\" height=\"50\" width=\"135\"/></div>";
	}


	function do_html_URL($url, $name) {
	  // output URL as link and br
?>
  <a href="<?php echo $url; ?>"><?php echo $name; ?></a><br />
<?php
}

	
	
	
	
	
	
	
	
	
	
	

