<?php
	
	require("db/db.php");

	$name = $_REQUEST['name'];
	$comments = $_REQUEST['comments'];
		
	mysqli_query($con, "insert into comments(name, comments) values('$name', '$comments')");
	
	$result = mysqli_query($con, "select * from comments order by id asc");
	
	while($row = mysqli_fetch_array($result)) {
	
		echo "<div class='comments_content'>";
		echo "<h4 class='h4'><a href='delete.php?id=" . $row['id'] . "'> X</a></h4>";
		echo "<h1 class='h1'>" . $row['name'] . "</h1>";
		echo "<h2 class='h2'>" . $row['date_publish'] . "</h2></br></br>";
		echo "<h3 class='h3'>" . $row['comments'] . "</h3>";
		//echo "<h1 class='h1'>" . $_SESSION['valid_user'] . "</h1>";
		echo "</div>";
		
	}
	
	mysqli_close($con);
		
?>
