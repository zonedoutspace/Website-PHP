<?php

	require_once("connect.php");
	
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	
	
	
		switch ($action) {
					
			case 'viewArticle':
			    viewArticle();
			    break;
			    
	  		default:
	    		homepage();
	
		}
		
		
			
		
	
	
	
		function homepage() {
	
			$results = array();
			$data = Article::getList( HOMEPAGE_NUM_ARTICLES );
			$results['articles'] = $data['results'];
			$results['totalRows'] = $data['totalRows'];
			$results['pageTitle'] = "Upcoming Events";
			require( TEMPLATE_PATH . "/thingstodo.php" );
		  
		}	



?>