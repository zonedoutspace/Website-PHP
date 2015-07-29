<?php

	require("db/db.php");
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		
		mysqli_query($con, "delete form comments where id='$id'");
		header("location: ../activities.php");
	
	}
	
	mysqli_close($con);
	
?>
