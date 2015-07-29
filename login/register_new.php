<?php

	require_once('display_all.php');
	
	// create variable names
	$email = $_POST['email'];
	$name = $_POST['name'];
	$username = $_POST['username'];
	$passwd = $_POST['passwd'];
	$passwd2 = $_POST['passwd2'];
	
	session_start();
	
	try {
	
		// check if form is filled in.
		if (!filled_out($_POST)) {
	    	throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>You have not filled the form out correctly - please go back and try again.</span></div>');
	    }
	
	    // email address not valid
	    if (!valid_email($email)) {
	      throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>That is not a valid email address.  Please go back and try again.</span></div>');
	    }
	    
	    // passwords dont mactch
	    if ($passwd != $passwd2) {
	    	throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>Passwords dont match. Please go back and try again.</span></div>');
	    }
	    
	    // if passwords length is too long or short
	    if ((strlen($passwd) < 6) || (strlen($passwd) > 16 )) {
	    	throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>Password must be between 6 and 16 characters.</span></div>');	
	    }
	    
	    // Register the new user
	    register($email, $name, $username, $passwd);
	    	 $_SESSION['valid_user'] = $username;
	    
	    // Registration was successful
		echo "<br /><div class=\"container\"><span style=\"color:green;\"><h4>Your registration was successful!</h4></span>";
		echo "<br>";
	    echo "<a href='login_form.php'>Login</a></div>";

	}
	
	catch (Exception $e) {
		echo $e->getMessage();
     	exit;
	}


?>