<?php

	require_once('db_connect.php');
	require_once('data_valid_fns.php');
	require_once('login_functions.php');
	require_once('login_form.php');

	// creating short variable name
	$username = $_POST['username'];
	
	try {
		$password = reset_password($username);
		notify_password($username, $password);
		echo '<br/><div class=\'container\'><span style=\'color:green;\'>Your new password has been emailed to you.<br /></span></div>';
	}
	
	catch (Exception $e) {
		echo '<br /><div class=\'container\'><span style=\'color:red;\'>Your password could not be reset - please try again later.</span></div>';
	}

?>