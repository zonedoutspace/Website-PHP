<!DOCTYPE html>
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"/>
        <title></title>
    </head>
    <body>

<?php

include 'comments.class.php';


$db_details = array(
	'db_host' => 'localhost',
	'db_user' => 'david_db',
	'db_pass' => 'd16331633',
	'db_name' => 'fiji'
	);


$settings = array('isAdmin' => true, 'public' => false); // that is all you need to specify to be in admin mode :D

$page_id = 1;

$comments = new Comments_System($db_details, $settings);

$comments->grabComment($page_id);

if($comments->success)
	echo "<div class='alert alert-success' id='comm_status'>".$comments->success."</div>";
else if($comments->error)
	echo "<div class='alert alert-error' id='comm_status'>".$comments->error."</div>";
?>

<div class="container-fluid" style="background-color:#4C4C4C;">

	<div class="container" style="width:80%; background-color:white; padding:10px;">
	
	<div class="jumbotron"><h2>Admin Panel</h2><p>Admin Panel for Things To Do comment section.</p></div>
	<br><br>
		<?php
		// a simple form
		echo $comments->generateForm();
		
		// we show the posted comments
		echo $comments->generateComments($page_id); // we pass the page id
		
		?>
		
		<br><br><br>
		
	</div>
		
</div>
