<?php

	require_once('db_fns.php');


	// check username and password with db, if yes, return true, else, return false.
	function login($username, $password) {
	
		$conn = db_connect();
		
		if(!$conn) {
			return 0;
		}
	
		$result = $conn->query("select * from admin where username = '".$username."' and password = sha1('".$password."')");
		
		if (!$result) {	
			return 0;
		}
		
		if ($result->num_rows > 0) {
		    return 1;
		} else {
		    return 0;
		}

	}
	
	
	
	// see if somebody is logged in and notify them if not.
	function check_admin_user() {
	
		if (isset($_SESSION['admin_user'])) {	
			return true;
		} else {
			return false;
		}
	
	}
	
	
	
	
	// change password for username/old_password to new_password
	// return true or false
	function change_password($username, $old_password, $new_password) {
	
	
		// if the old password is right
		// change their password to new_password and return true
		// else return false
		if (login($username, $old_password)) {
		
			if (!($conn = db_connect())) {
		      return false;
		    }
		    
		    $result = $conn->query("update admin set password = sha1('".$new_password."') where username = '".$username."'");

			if (!$result) {
		      return false;  // not changed
		    } else {
		      return true;  // changed successfully
		    }
		    
		  } else {
		    return false; // old password was wrong

		}
	
	}
	
	

?>