<?php


	function db_connect() {
	
		// Set your Username, Password, And DB Name.
		$result = new mysqli('localhost', '', '', '');

	   if (!$result) {
	      return false;
	   }
	   $result->autocommit(TRUE);
	   return $result;
	}	
	
	

?>