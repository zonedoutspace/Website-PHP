<?php

	function db_connect() {
	
		// Set your Username, Password, And DB Name.
		$result = new mysqli('localhost', '', '', '');
		if(!$result) {
			throw new Exception('Could not connect to database.');
		} else {
			return $result;
		}
	}
	
?>