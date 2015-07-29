<?php


	// Set your Username, Password, And DB Name.
	$con = mysqli_connect("localhost", "", "", "");
	
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
?>