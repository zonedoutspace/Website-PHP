<?php

	class Article {
	
		public $id = null;
		
		public $publicationDate = null;
		
		public $title = null;
		
		public $summary = null;
		
		public $content = null;
		
		public $imageExtension = "";
		
		public $date = null;
		
		
	
		// Sets the object's properties using the values in the supplied array.
		public function __construct( $data = array() ) {
		
			if(isset( $data['id'] )) $this->id = (int) $data['id'];
			if(isset( $data['publicationDate'] )) $this->publicationDate = (int) $data['publicationDate'];
			if(isset( $data['title'] )) $this->title = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['title']);
			if(isset( $data['summary'] )) $this->summary = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['summary']);
			if(isset( $data['content'] )) $this->content = $data['content'];
			if(isset( $data['imageExtension'] )) $this->imageExtension = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['imageExtension']);
			if(isset( $data['date'] )) $this->date = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['date']);
			
		}
		
		
		
		
		// Our next method, storeFormValues(), is similar to the constructor in that it stores a supplied array 
		// of data in the object's properties. The main difference is that storeFormValues() can handle data in the 
		// format that is submitted via our New Article and Edit Article forms (which we'll create later). 
		// In particular, it can handle publication dates in the format YYYY-MM-DD, converting the date into 
		// the UNIX timestamp format suitable for storing in the object.
		public function storeFormValues( $params ) {
		
			// Store all the parameters
			$this->__construct( $params );
			
			// Parse and store the date
			if (isset($params['publicationDate'])) {
				$publicationDate = explode ('-', $params['publicationDate']);
				
				if ( count($publicationDate) == 3 ) {
					list ( $y, $m, $d ) = $publicationDate;
					$this->publicationDate = mktime (0, 0, 0, $m, $d, $y );
				}
				
			}
					
		}
		
		
		
		// We'll call this method from the admin.php script whenever the user uploads a new article image using 
		// the article edit form. Its job is to move the uploaded image to the fullsize images folder we created 
		// in Step 1, as well as generate a thumbnail version of the image and store it in the thumb folder.
		public function storeUploadedImage( $image ) {
		
			if ($image['error'] == UPLOAD_ERR_OK ) {
			
				// Does the Article object have an ID?
				if ( is_null( $this->id ) ) trigger_error( "Article::storeUploadedImage(): Attempt to upload an image for an Article object that does not have its ID property set.", E_USER_ERROR );
				
				 // Delete any previous image(s) for this article
				 $this->deleteImages();
				 
				 // Get and store the image filename extension
				 $this->imageExtension = strtolower( strrchr( $image['name'], '.' ) );
				 
				 // Store the image
				 
				 $tempFilename = trim( $image['tmp_name'] );
				 
				 if ( is_uploaded_file ($tempFilename) ) {
				 
				 	if ( !( move_uploaded_file( $tempFilename, $this->getImagePath() ) ) ) trigger_error( "Article::storeUploadedImage(): Couldn't move uploaded file.", E_USER_ERROR );
				 	if ( !( chmod( $this->getImagePath(), 0666 ) ) ) trigger_error( "Article::storeUploadedImage(): Couldn't set permissions on uploaded file.", E_USER_ERROR );
				 }
				 
				 // Get the image size and type
				 $attrs = getimagesize ( $this->getImagePath() );
				 $imageWidth = $attrs[0];
				 $imageHeight = $attrs[1];
				 $imageType = $attrs[2];
				 
				 // Load the image into memory
				 switch ($imageType) {
				 
				 	case IMAGETYPE_GIF:
				 	
				 		$imageResource = imagecreatefromgif ( $this->getImagePath() );
				 		break;
				 	case IMAGETYPE_JPEG:
				 	
				 		$imageResource = imagecreatefromjpeg ( $this->getImagePath() );
				 		break;
					case IMAGETYPE_PNG:
				 	
				 		$imageResource = imagecreatefrompng ( $this->getImagePath() );
				 		break;
				 		
				 	default:
				 		trigger_error ( "Article::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
				 
				 }
				 
		      
				 // Copy and resize the image to creat a thumbnail
				 $thumbHeight = intval ( $imageHeight / $imageWidth * ARTICLE_THUMB_WIDTH );
				 $thumbResource = imagecreatetruecolor ( ARTICLE_THUMB_WIDTH, $thumbHeight );
				 imagecopyresampled( $thumbResource, $imageResource, 0, 0, 0, 0, ARTICLE_THUMB_WIDTH, $thumbHeight, $imageWidth, $imageHeight );
				 
								 
				 // Save the thumbnail
				 switch ($imageType) {
				 
				 	case IMAGETYPE_GIF:
				 	
				 		imagegif ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB ) );
				 		break;
				 	case IMAGETYPE_JPEG:
				 	
				 		imagejpeg ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB ), JPEG_QUALITY );

				 		break;
					case IMAGETYPE_PNG:
				 	
				 		imagepng ( $thumbResource, $this->getImagePath( IMG_TYPE_THUMB ) );
				 		break;
				 		
				 	default:
				 		trigger_error ( "Article::storeUploadedImage(): Unhandled or unknown image type ($imageType)", E_USER_ERROR );
				 
				 }
				 
				 $this->update();
		 
				 
			}
		
		}
		
		
		
		
		public function deleteImages() {
 
		    // Delete all fullsize images for this article
		    foreach (glob( ARTICLE_IMAGE_PATH . "/" . IMG_TYPE_FULLSIZE . "/" . $this->id . ".*") as $filename) {
		    
		      if ( !unlink( $filename ) ) trigger_error( "Article::deleteImages(): Couldn't delete image file.", E_USER_ERROR );
		      
		    }
		     
		    // Delete all thumbnail images for this article
		    foreach (glob( ARTICLE_IMAGE_PATH . "/" . IMG_TYPE_THUMB . "/" . $this->id . ".*") as $filename) {
		    
		      if ( !unlink( $filename ) ) trigger_error( "Article::deleteImages(): Couldn't delete thumbnail file.", E_USER_ERROR );
		      
		    }
		 
		    // Remove the image filename extension from the object
		    $this->imageExtension = "";
		    
		}
		 
		 
		 
		 
		 
		 
		/**
		* Returns the relative path to the article's full-size or thumbnail image
		*
		* @param string The type of image path to retrieve (IMG_TYPE_FULLSIZE or IMG_TYPE_THUMB). Defaults to IMG_TYPE_FULLSIZE.
		* @return string|false The image's path, or false if an image hasn't been uploaded
		*/
	    public function getImagePath( $type=IMG_TYPE_FULLSIZE ) {
		  
			return ( $this->id && $this->imageExtension ) ? ( ARTICLE_IMAGE_PATH . "/$type/" . $this->id . $this->imageExtension ) : false;
		    
		}
				
				
				
				
				
				
		// Returns an Article object matching the given article ID.
				
		// Now we come to the methods that actually access the MySQL database. The first of these, getById(), 
		// accepts an article ID argument ($id), then retrieves the article record with that ID from the articles 
		// table, and stores it in a new Article object.
		public static function getById( $id ) {
				
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "select *, UNIX_TIMESTAMP(publicationDate) as publicationDate from upcoming_events where id = :id";
			$st = $conn->prepare( $sql );
			$st->bindValue( ":id", $id, PDO::PARAM_INT );
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ($row) return new Article($row);
					
		}
				
		
		
		
		
		// Returns all (or a range of) Article objects in the DB
		
		// Our next method, getList(), is similar in many ways to getById(). The main difference, as you might 
		// imagine, is that it can retrieve many articles at once, rather than just 1 article. It's used whenever 
		// we need to display a list of articles to the user or administrator.
		public static function getList( $numRows = 1000000, $order = "publicationDate desc" ) {
		
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "select SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(publicationDate) as publicationDate from upcoming_events
					 order by " . mysql_escape_string($order) . " limit :numRows";
					 
			$st = $conn->prepare( $sql );
			$st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
			$st->execute();
			$list = array();
			
			while ( $row = $st->fetch() ) {
			
				$article = new Article( $row );
				$list[] = $article;
			}
			
			// Now get the total number of articles that matched the criteria
			$sql = "select FOUND_ROWS() as totalRows";
			$totalRows = $conn->query( $sql )->fetch();
			$conn = null;
			return (array( "results" => $list, "totalRows" => $totalRows[0] ) );
			
		}
		
				
				
		// Inserts the current Article object into the database, and sets its ID property.
		public function insert() {
		
			// Does the Article object already have an ID?
			if ( !is_null ($this->id ) ) trigger_error ( "Article::insert(): Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR );
			
			// Insert the Article.
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "insert into upcoming_events (publicationDate, title, summary, content, imageExtension, date ) values ( FROM_UNIXTIME(:publicationDate), :title, :summary, :content, :imageExtension, :date )";					 
			$st = $conn->prepare( $sql );
			$st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
		    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
		    $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
		    $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
		    $st->bindValue( ":imageExtension", $this->imageExtension, PDO::PARAM_STR );
		    $st->bindValue( ":date", $this->date, PDO::PARAM_STR );
		    $st->execute();
		    $this->id = $conn->lastInsertId();
		    $conn = null;

		}
		
	
	
		
		
		// Updates the current Article object in the database.
		public function update() {
 
		 	// Does the Article object have an ID?
		    if ( is_null( $this->id ) ) trigger_error ( "Article::update(): Attempt to update an Article object that does not have its ID property set.", E_USER_ERROR );
		    
		    // Update the Article
		    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		    $sql = "update upcoming_events set publicationDate = FROM_UNIXTIME(:publicationDate), title = :title, summary = :summary, content = :content, imageExtension = :imageExtension, date = :date where id = :id";
		    $st = $conn->prepare ( $sql );
		    $st->bindValue( ":publicationDate", $this->publicationDate, PDO::PARAM_INT );
		    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
		    $st->bindValue( ":summary", $this->summary, PDO::PARAM_STR );
		    $st->bindValue( ":content", $this->content, PDO::PARAM_STR );
		    $st->bindValue( ":imageExtension", $this->imageExtension, PDO::PARAM_STR );
		    $st->bindValue( ":date", $this->date, PDO::PARAM_STR );
		    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
		    $st->execute();
		    $conn = null;
		    
		 }
		 		 
		 
		 
		 
		 // Deletes the current Article object from the database.
		 public function delete() {
 
		    // Does the Article object have an ID?
		    if ( is_null( $this->id ) ) trigger_error ( "Article::delete(): Attempt to delete an Article object that does not have its ID property set.", E_USER_ERROR );
		 
		    // Delete the Article
		    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		    $st = $conn->prepare ( "delete from upcoming_events where id = :id limit 1" );
		    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
		    $st->execute();
		    $conn = null;
		    
		  }	
	
	

	
	}

?>