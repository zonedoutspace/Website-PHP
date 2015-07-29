<?php

	require_once('includes.php');
	session_start();
	
	if (($_POST['username']) && ($_POST['passwd'])) {
	
		$username = $_POST['username'];
		$passwd = $_POST['passwd'];
		
		if(login($username, $passwd)) {
		
			$_SESSION['admin_user'] = $username;
		} else {
		
			echo "<p>You could not be logged in.<br/></p>";
      		//do_html_url('login.php', 'Login');
      		exit;
		}
	
	}
	
	if (check_admin_user()) {
	
		display_admin_menu();
	} else {
	
		echo "<p>You are not authorized to enter the administration area.</p>";
	}


?>