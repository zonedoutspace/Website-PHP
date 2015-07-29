<?php
	
	require("db/db.php");
	
	$result = mysqli_query($con, "SELECT * FROM comments ORDER BY id ASC");
	
	while($row = mysqli_fetch_array($result)) {
	
		echo "<div class='comments_content'>";
		echo "<h4 class='h4'><a href='comment/delete.php?id=" . $row['id'] . "'> X</a></h4>";
		echo "<h1 class='h1'>" . $row['name'] . "</h1>";
		echo "<h2 class='h2'>" . $row['date_publish'] . "</h2></br></br>";
		echo "<h3 class='h3'>" . $row['comments'] . "</h3>";
		echo "</div>";
	
	}
	
	mysqli_close($con);

?>