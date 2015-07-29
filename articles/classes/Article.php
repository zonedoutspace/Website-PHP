<?php

	// This handles the nitty-gritty of storing articles in the database, as well as retrieving 
	// articles from the database.

	/**
	  * Class to handle articles
	  */

	class Article
	{

		// Properties

		/**
  		* @var int The article ID from the database
  		*/

  		public $id = null;

  		/**
		* @var int When the article was published
		*/

		public $publicationDate = null;
		 
		/**
		* @var string Full title of the article
		*/

		public $title = null;
		 
		/**
		* @var string A short summary of the article
		*/

		public $summary = null;
		 
		/**
		* @var string The HTML content of the article
		*/

		public $content = null;
		
		/**
		* @var string The filename extension of the article's full-size and thumbnail images (empty string means the article has no image)
		*/
		public $imageExtension = "";
		 
		 
		/**
		* Sets the object's properties using the values in the supplied array
		*
		* @param assoc The property values
		*/

		public function __construct($data = array() ) {

			if (isset( $data['id'])) $this->id = (int) $data['id'];
			if (isset( $data['publicationDate'])) $this->publicationDate = (int) $data['publicationDate'];
			if (isset( $data['title'])) $this->title = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['title'] );
		    if (isset( $data['summary'])) $this->summary = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['summary'] );
		    if (isset( $data['content'])) $this->content = $data['content'];
		    if (isset( $data['imageExtension'])) $this->imageExtension = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\$ a-zA-Z0-9()]/", "", $data['imageExtension'] );
		}


		/**
		* Sets the object's properties using the edit form post values in the supplied array
		*
		* @param assoc The form post values
		*/

		// storeFormValues() can handle data in the format that is submitted via our New Article 
		// and Edit Article forms (which we'll create later). In particular, it can handle 
		// publication dates in the format YYYY-MM-DD, converting the date into the UNIX timestamp format suitable for storing in the object.
		public function storeFormValues ($params) {

			// Store all  the parameters
			$this->__construct($params);

			// Parse and store the publication date
			if (isset($params['publicationDate'])) {

				$publicationDate = explode ('-', $params['publicationDate']);

				if (count($publicationDate) == 3) {

					list ($y, $m, $d) = $publicationDate;
					$this->publicationDate = mktime (0, 0, 0, $m, $d, $y);
				}
			}
		}



		/**
		* Stores any image uploaded from the edit form
		*
		* @param assoc The 'image' element from the $_FILES array containing the file upload data
		*/
		
		
		// We'll call this method from the admin.php script whenever the user uploads a new article 
		// image using the article edit form. Its job is to move the uploaded image to the fullsize 
		// images folder we created in Step 1, as well as generate a thumbnail version of the image 
		// and store it in the thumb folder.
		public function storeUploadedImage($image) {
			
			if($image['error'] == UPLOAD_ERR_OK) {
				// Does the Article object have an ID?
				if(is_null($this->id)) trigger_error("Article::storeUploadedImage:
					Attempt to upload an image for an Article object thatd does not have its ID property set.", E_USER_ERROR );
					
					
				// This method calls the Article::deleteImages() method to delete any existing 
				// full-size and thumbnail image files associated with the article. 
				// (We'll write this method in a moment.) 	
				
				// Delete any prevoius images for this Article
				$this->deleteImages();
				
				// Get and store the image filename extension
      			$this->imageExtension = strtolower(strrchr($image['name'], '.'));
      			
				// Store the image
				$tempFilename = trim($image['tmp_name']);
				
				
				// Then the method calls is_uploaded_file() to check that the file in the temporary 
				// folder is indeed a file uploaded by PHP.
				if(is_uploaded_file($tempFilename)) {
				
					// Finally, the method calls the move_uploaded_file() function to move the 
					// uploaded image from the temporary folder to the images/articles/fullsize folder. 
					if(!(move_uploaded_file($tempFilename, $this->getImagePath() ))) trigger_error("Article::storeUploadedImage(): Couldn't move uploaded file.", E_USER_ERROR);
						
					// Once the file's in place, the method calls the chmod() function to set the 
					// file's permissions to 0666. This ensures that the file can be read and written 
					// by anyone, including the web server user and any FTP user that may need to 
					// change or delete the article images.	
					if ( !( chmod( $this->getImagePath(), 0666 ) ) ) trigger_error
						( "Article::storeUploadedImage(): Couldn't set permissions on uploaded file.", E_USER_ERROR );
				}
				
				
				// Get the image size and type.
				$attrs = getimagesize($this->getImagePath());
				$imageWidth = $attrs[0];
				$imageHeight = $attrs[1];
				$imageType = $attrs[2];
				
				// Load the image into memory
				switch($imageType) {
				
					case IMAGETYPE_GIF:
						$imageResource = imagecreatefromgif ($this->getImagePath() );
						break;
					case IMAGETYPE_JPEG:
						$imageResource = imagecreatefromjpeg ($this->getImagePath() );
						break;
					case IMAGETYPE_PNG:
						$imageResource = imagecreatefrompng ($this->getImagePath() );
						break;
					default:
						trigger_error("Article::storeUploadedImage(): Unhandled or unknown image 
										type ($imageType)", E_USER_ERROR );
				}
				
				
				// Now it's time to create the thumbnail image. To do this, the method first computes
				// the thumbnail height, $thumbHeight, based on the full-size image height 
				// ($imageHeight), the full-size image width ($imageWidth), and the desired thumbnail
				//  width (ARTICLE_THUMB_WIDTH).
				
				// Copy and resize the image to create the thumbnail
		        $thumbHeight = intval ( $imageHeight / $imageWidth * ARTICLE_THUMB_WIDTH );
		        
		        // Next it calls imagecreatetruecolor() to create a blank image resource for storing 
		        // the thumbnail image data, passing in the width and height of the image to create.
		        $thumbResource = imagecreatetruecolor ( ARTICLE_THUMB_WIDTH, $thumbHeight );
		        
		        // Finally, it calls imagecopyresampled() to create the smaller version of the
		        // uploaded image and store the result in the $thumbResource variable. It passes the
		        // following arguments to imagecopyresampled():
		        imagecopyresampled( $thumbResource, $imageResource, 0, 0, 0, 0, ARTICLE_THUMB_WIDTH, 
		        						$thumbHeight, $imageWidth, $imageHeight );
		        						
		        
		        // Save the Thumnail.
		        switch($imageType) {
		        
		        	case IMAGETYPE_GIF:
						imagegif ($thumbResource, $this->getImagePath(IMG_TYPE_THUMB) );
						break;
					case IMAGETYPE_JPEG:
						imagejpeg ($thumbResource, $this->getImagePath(IMG_TYPE_THUMB) );
						break;
					case IMAGETYPE_PNG:
						imagepng ($thumbResource, $this->getImagePath(IMG_TYPE_THUMB) );
						break;
					default:
						trigger_error("Article::storeUploadedImage(): Unhandled or unknown image 
										type ($imageType)", E_USER_ERROR );
		        }
		        
		        $this->update();
				
			}	
		}
		
		
		
		/**
  		* Deletes any images and/or thumbnails associated with the article
  		*/
  		
  		// The deleteImages() method is responsible for clearing out any image files associated with 
  		// the current article. It's called by storeUploadedImage() before uploading a new image 
  		// (as you saw in the previous section). 
  		public function deleteImages() {
  		
  			// Delete all fullsize images for this article
  			
  			// deleteImages() calls PHP's glob() function to retrieve a list of all image files in 
  			// both the images/articles/fullsize and images/articles/thumb folders that are named 
  			// after the article's ID. 
  			foreach(glob(ARTICLE_IMAGE_PATH . "/" . IMG_TYPE_FULLSIZE . "/" . $this->id . ".*") as $filename) {
  			
  				// For each filename in the array returned by glob(), the method attempts to delete
  				// the file by calling PHP's unlink() function. If there's a problem deleting the 
  				// file then it raises an error and exits.
  				if(!unlink($filename)) trigger_error 
  								("Article::deleteImages(): Couldn't delete image file.", E_USER_ERROR);
  			}
  			
  			
  			// Delete all thumbnail images for this article
		    foreach (glob( ARTICLE_IMAGE_PATH . "/" . IMG_TYPE_THUMB . "/" . $this->id . ".*") as $filename) {
		    	if(!unlink( $filename)) trigger_error("Article::deleteImages(): Couldn't delete thumbnail file.", E_USER_ERROR);
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
		 
		
		// The last new method we've added to the Article class is getImagePath(), which returns the 
		// path to one of the two article images.
		
		// The method takes a single, optional argument, $type, that indicates whether it should 
		// return the path to the full-size image (IMG_TYPE_FULLSIZE, the default), or the thumbnail 
		// (IMG_TYPE_THUMB). It then uses the article's ID, along with the value stored in the article's 
		// $imageExtension property, to compute the path to the image file inside the images/articles/fullsize 
		// or images/articles/thumb folder.
		
		// For example, if getImagePath() is passed IMG_TYPE_THUMB as an argument, the article's ID 
		// is 3, and its $imageExtension property contains ".jpg", then the method will return the 
		// value "images/articles/thumb/3.jpg".
		public function getImagePath( $type=IMG_TYPE_FULLSIZE ) {
			return ( $this->id && $this->imageExtension ) ? 
						( ARTICLE_IMAGE_PATH . "/$type/" . $this->id . $this->imageExtension ) : false;
		}
  		
  		
  		
		/**
		* Returns an Article object matching the given article ID
		*
		* @param int The article ID
		* @return Article|false The article object, or false if the record was not found or there was a problem
		*/
		
		
		public static function getById( $id ) {

			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD);
			$sql = "select *, UNIX_TIMESTAMP(publicationDate) as publicationDate from
					articles where id = :id";
			$st = $conn->prepare($sql);
			$st->bindValue(":id", $id, PDO::PARAM_INT);
			$st->execute();
			$row = $st->fetch();
			$conn = null;
			if ($row) return new Article ($row);
		}
		


		/**
		* Returns all (or a range of) Article objects in the DB
		*
		* @param int Optional The number of rows to return (default=all)
		* @param string Optional column by which to order the articles (default="publicationDate DESC")
		* @return Array|false A two-element array : results => array, a list of Article objects; totalRows => Total number of articles
		*/


		// This is used whenever we need to display a list of articles to the user or administrator.
		public static function getList ($numRows = 1000000, $order = "publicationDate DESC") {
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD);
			$sql = "select SQL_CALC_FOUND_ROWS *, UNIX_TIMESTAMP(publicationDate) as
					publicationDate from articles order by " . mysql_escape_string($order) . " limit :numRows";

			$st = $conn->prepare($sql);
			$st->bindValue (":numRows", $numRows, PDO::PARAM_INT);
			$st->execute();
			$list = array();

			while ($row = $st->fetch()) {

				$article = new Article ($row);
				$list[] = $article;
			}

			// Now get the total number of articles that matched the criteria
			$sql = "select FOUND_ROWS() as totalRows";
			$totalRows = $conn->query($sql)->fetch();
			$conn = null;
			return (array("results" => $list, "totalRows" => $totalRows[0]));
		}




		/**
		* Inserts the current Article object into the database, and sets its ID property.
		*/


		public function insert() {

			// Does the Article object already have an ID?
			if (!is_null($this->id)) trigger_error("Article::insert():Attempt to insert an Article object that already has its ID property set (to $this->id).", E_USER_ERROR);

			// Insert the Article
			$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$sql = "insert into articles (publicationDate, title, summary, content, imageExtension) values
					(FROM_UNIXTIME(:publicationDate), :title, :summary, :content, :imageExtension )";

			$st = $conn->prepare ($sql);
		    $st->bindValue(":publicationDate", $this->publicationDate, PDO::PARAM_INT);
		    $st->bindValue(":title", $this->title, PDO::PARAM_STR);
		    $st->bindValue(":summary", $this->summary, PDO::PARAM_STR);
		    $st->bindValue(":content", $this->content, PDO::PARAM_STR);
		    $st->bindValue(":imageExtension", $this->imageExtension, PDO::PARAM_STR);
		    $st->execute();
		    $this->id = $conn->lastInsertId();
		    $conn = null;
		}
		



		/**
		* Updates the current Article object in the database.
		*/


		public function update() {
 
		    // Does the Article object have an ID?
		    if (is_null($this->id)) trigger_error ("Article::update(): Attempt to update an Article object that does not have its ID property set.", E_USER_ERROR);
		    
		    // Update the Article
		    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		    $sql = "update articles set publicationDate = FROM_UNIXTIME(:publicationDate), 
		    			title = :title, summary = :summary, content = :content, imageExtension = :imageExtension where id = :id";
		    $st = $conn->prepare ($sql);
		    $st->bindValue(":publicationDate", $this->publicationDate, PDO::PARAM_INT );
		    $st->bindValue(":title", $this->title, PDO::PARAM_STR);
		    $st->bindValue(":summary", $this->summary, PDO::PARAM_STR);
		    $st->bindValue(":content", $this->content, PDO::PARAM_STR);
		    $st->bindValue(":imageExtension", $this->imageExtension, PDO::PARAM_STR);
		    $st->bindValue(":id", $this->id, PDO::PARAM_INT);
		    $st->execute();
		    $conn = null;
		}
 
 


		/**
		* Deletes the current Article object from the database.
		*/
		 

		public function delete() {
		 
		    // Does the Article object have an ID?
		    if (is_null($this->id)) trigger_error ("Article::delete(): Attempt to delete an Article object that does not have its ID property set.", E_USER_ERROR);
		 
		    // Delete the Article
		    $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		    $st = $conn->prepare ("delete from articles where id = :id limit 1");
		    $st->bindValue(":id", $this->id, PDO::PARAM_INT);
		    $st->execute();
		    $conn = null;
		}



	}



?>