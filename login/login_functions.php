<?php

	require_once('db_connect.php');


	// Function to register the new user.
	function register($email, $name, $username, $password) {
	
		$conn = db_connect();
		
		// check if username is unique
		$result = $conn->query("select * from login where username='".$username."'");
		
		if (!$result) {
		  throw new Exception('<div class=\'container\'><span style=\'color:red;\'>Could not execute query.</span></div>');
		}
		
		if ($result->num_rows>0) {
		  throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>That username is taken - go back and choose another one.</span></div>');
		}
		
		// if ok, put in db
		$result = $conn->query("insert into login values
						('', '".$email."', '".$name."', '".$username."', sha1('".$password."'))");
	
		if (!$result) {
			throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>Could not register you in database.</span></div>');
		}
		
		return true;
		
	}
	
	// Function to Login In
	function login($username, $password) {
		$conn = db_connect();
		
		$result = $conn->query("select * from login where username = '".$username."' and passwd = sha1('".$password."')");
		
		if (!$result) {
			throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>Could not log in.</span></div>');
		}
		
		if ($result->num_rows > 0) {
			return true;
		} else {
			throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>Could not login.</span></div>');
		}
	
	}
	
	
	
		// ** This function checks that the User Has a Valid Session. ** //	
		function check_valid_user() {
			// see if somebody is logged in and notify them if not
			if (isset($_SESSION['valid_user'])) {
				//echo "Logged in as ".$_SESSION['valid_user'].".<br />";
			} else {
				// they are not logged in
			    echo '<br /><div class=\'container\'><span style=\'color:red;\'>You are not logged in.<br /></span></div>';
			    exit;
			}
		}
		
		


	// ** Function updates a user password in the database ** //
	function change_password($username, $old_password, $new_password) {

		// change password forr username/old_password to new_password

			// if the old password is right
			// change their password to new_password and return true, else throw Exception
			login($username, $old_password);
			$conn = db_connect();

			$result = $conn->query("update login set passwd = sha1('".$new_password."') where username = '".$username."'");

			if (!$result) {
				throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>Password could not be changed.</span></div>');
			} else {
					return true;	// successfully changed.
			}
	}

	
		
	// ** Function that resets a Users Password to a random value and Emails the new one.
	function reset_password($username) {
		// set password for username to a random value
		// return the new password or fasle on falure.
			// get random dictionary word b/w 6 and 13 chars length.
			$new_password = get_random_word(6, 13);
			
			if ($new_password == false) {
				throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>Could not generate new password.</span></div>');
			}

			// add a number between 0 and 999 to it
			// to make it a slightly better password.	
			$rand_number = rand(0, 999);
			
			$new_password .= $rand_number;	
			
		// set user's password to this in database or return false
		$conn = db_connect();
		
		$result = $conn->query("update login set passwd = sha1('".$new_password."') where username = '".$username."'");
		
		if (!$result) {
			throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>Could not change password.</span></div>');
		} else {
			return $new_password;	// changed successfully
		}	
		
	}
	
	
	// ** Function gets a random word from dictionary for generating new password
	function get_random_word($min_length, $max_length) {
		// grab a random word from the dictionay between thw two lengths and return it.
		
		// generate a random word
		$word = '';
		
		// remember to change this path to suit your system.
		$dictionary = 'wordsEn.txt';
		$fp = @fopen($dictionary, 'r');
		
		if (!$fp) {
			return false;
		}
		
		$size = filesize($dictionary);
		
		// go to random location in the dictioanry
		$rand_location =  rand(0, $size);
		fseek($fp, $rand_location);
		
		// get the next whole word of the right length in the file.
		while ((strlen($word) < $min_length) || (strlen($word) > $max_length) || (strstr($word, "'"))) {
			if (feof($fp)) {
				fseek($fp, 0);	// if at end, go to start
			}
			
			$word = fgets($fp, 80);	// skip the first word as it could ne partial
			$word = fgets($fp, 80);	// the potential password
		}
		
		$word = trim($word);	// trim the trailing \n from fgets
		return $word;
	
	}
	
	
	
	// *** Function emails a reset password to a user
	function notify_password($username, $password) {
		// notify the user that their password has been chabged
		
			$conn = db_connect();
			
			$result = $conn->query("select email from login where username = '".$username."'");
			
			if (!$result) {
				throw new Exception('<div class=\'container\'><span style=\'color:red;\'>Could not find email address.</span></div>');
			} else if ($result->num_rows == 0) {
				throw new Exception('<div class=\'container\'><span style=\'color:red;\'>Could not find email address.</span></div>');	// username not in database.
			} else {
			$row = $result->fetch_object();
			$email = $row->email;
			$from = "From: support@fijitravel \r\n";
			$mesg = "From FijiTravel: Password has been changed to: ".$password."\r\n"
					."Please change it the next time you login.\r\n";
					
			if (mail($email, 'FijiTravel login information: ', $mesg, $from)) {
				return true;
			} else {
				throw new Exception('<div class=\'container\'><span style=\'color:red;\'>Could not send email.</span></div>');
			}						
		}
	}
	
	

?>