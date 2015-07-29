<?php

	require_once('db_connect.php');
	require_once('data_valid_fns.php');
	require_once('login_functions.php');
	require_once('member_form.php');
	
	session_start();
	
	// variable
	$username = $_POST['username'];
	$passwd = $_POST['passwd'];
	
	if ($username && $passwd) {
	
		try {
			login ($username, $passwd);
			// if they are in the database register the user id
			$_SESSION['valid_user'] = $username;

		}
		
		catch(Exception $e) {
			echo 'Username and/or Password dont match';
			echo '<br>';
			echo '<a href="login_form.php">back</a>';
		    exit;
		}
	}
	
	check_valid_user();
	display_member_form();
	
?>