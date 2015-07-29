<?php

	session_start();
	
	
	// an array to store all errors.
	$errors = [];
	
	
	if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
		
		// check if all of these are empty.
		$fields = [
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'message' => $_POST['message']
		];
		
		// loop through the $fields variable and display error message if empty.
		foreach($fields as $field => $data) {
			if(empty($data)) {
				$errors[] = 'The ' . $field . ' field is required.';
			}
		}
			
		
		// id there is no errors, send email
		if(empty($errors)) {
		
		
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];
			
			$to = "";	// <----- Your email address
			$subject = "New Message From Fiji.com Contact Form";
			
			mail($to, $subject, $message, "From: " . $email);
	
			
			echo "Thank You" . header('Location: thanks.php');
				 
		
		}
		
		
				
	} else {
		$errors[] = 'Something went wrong';
	}
	
	// store errors in a session
	$_SESSION['errors'] = $errors;
	
	
	$_SESSION['fields'] = $fields;
	
	// redirect user to contact.php if error
	header('Location: contact.php');
	
	
?>
