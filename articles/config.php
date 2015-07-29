<?php
	
	// ini_set lets error message to be displayed in the browser
	// it should be set to false on a live site since it can be a security risk.
	ini_set("display_errors", true);

	// As our CMS will use PHP's date() function, 
	// we need to tell PHP our server's timezone (otherwise PHP generates a warning message).
	date_default_timezone_set("America/New_York");

	/* Please fillout the Database name, password and username. */
	
	// DB_DSN, that tells PHP where to find our MySQL database.
	define("DB_DSN", "mysql:host = localhost; dbname=");
	define("DB_USERNAME", "");
	define("DB_PASSWORD", "");
	define("CLASS_PATH", "classes");		// CLASS_PATH, which is the path to the class files
	define("TEMPLATE_PATH", "templates");	// TEMPLATE_PATH, which is where our script should look for the HTML template files.
	
	// HOMEPAGE_NUM_ARTICLES controls the maximum number of article headlines to display 
	// on the site homepage. We've set this to 5 initially, but if you want more or less articles, just change this value.
	define("HOMEPAGE_NUM_ARTICLES", 5);

	// The ADMIN_USERNAME and ADMIN_PASSWORD constants contain the login details for the 
	// CMS admin user. Again, you'll want to change these to your own values.
	define("ADMIN_USERNAME", "");	// Your admin username
	define("ADMIN_PASSWORD", "");	// Your admin password
	
	// defines the path to the article images folder, relative to the top-level CMS folder. 
	define("ARTICLE_IMAGE_PATH", "images/articles");
	
	//defines a constant to represent the "full-size" image type. We'll use this in the code whenever
	// we want to indicate a full-size image. 
	define("IMG_TYPE_FULLSIZE", "fullsize");
	
	// defines the width to use for the article thumbnail images, in pixels.
	define("ARTICLE_THUMB_WIDTH", 120);
	
	// does a similar job to IMG_TYPE_FULLSIZE, but represents the "thumbnail" image type instead.
	define("IMG_TYPE_THUMB", "thumb");
	
	// defines the quality level to use when generating thumbnail versions of JPEG images.
	define("JPEG_QUALITY", 85 );

	// Since the Article class file â€” which we'll create next â€” is needed by all scripts in our application, we include it here.
	require ( CLASS_PATH . "/Article.php" );


	// Finally, we define handleException(), a simple function to handle any PHP exceptions that might be raised as our code runs.
	function handleException( $exception ) {
		// Display error message
		echo "Sorry, a problem occurred. Please try again later.";
		error_log( $exception->getMessage() );
	}

	// Once we've defined handleException(), we set it as the exception handler by calling PHP's set_exception_handler() function.
	set_exception_handler( 'handleException' );

	// *** Security note ***
	// In a live server environment it'd be a good idea to place config.php somewhere outside 
	// your website's document root, since it contains usernames and passwords.

?>