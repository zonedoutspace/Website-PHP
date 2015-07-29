<?php

	ini_set( "display_errors", true );
	date_default_timezone_set( "America/New_York" );
	
	/* Please fillout the Database name, password and username. */
	define("DB_DSN", "mysql:host=localhost;dbname=");
	
	define("DB_USERNAME", "");
	define("DB_PASSWORD", "");

	define("CLASS_PATH", "classes");
	define("TEMPLATE_PATH", "templates");
	define("HOMEPAGE_NUM_ARTICLES", 100);
	
	define("ADMIN_USERNAME", "");	// Your admin username
	define("ADMIN_PASSWORD", "");	// Your admin password
	
	define( "ARTICLE_IMAGE_PATH", "images/articles" );
	define( "IMG_TYPE_FULLSIZE", "fullsize" );
	define( "IMG_TYPE_THUMB", "thumb" );
	define( "ARTICLE_THUMB_WIDTH", 250 );
	define( "JPEG_QUALITY", 85 );

	require( CLASS_PATH . "/Article.php" );
	
	
	function handleException( $exception ) {
		echo "Sorry, a problem occurred. Please try later.";
		error_log( $exception->getMessage() );
	}
	
	set_exception_handler( 'handleException' );

?>