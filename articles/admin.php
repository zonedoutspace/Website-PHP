<?php

	require("config.php");
	session_start();
	$action = isset($_GET['action']) ? $_GET['action'] : "";
	$username = isset($_SESSION['username']) ? $_SESSION['username']: "";

	if ($action != "login" && $action != "logout" && !$username) {

		login();
		exit;
	}

	switch ($action) {

		case 'login':
			login();
			break;
		case 'logout':
			logout();
			break;
		case 'newArticle':
			newArticle();
			break;
		case 'editArticle':
			editArticle();
			break;
		case 'deleteArticle':
			deleteArticle();
			break;
		default:
			listArticles();
	}



	function login() {

		$results = array();
		$results['pageTitle'] = "Admin Login | Widget News";

		if (isset($_POST['login'])) {

			// User has posted the login form: attempt to log the user in.
			if($_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD) {

				// Login succesful: Create a session and redirect to the admin homepage.
				$_SESSION['username'] = ADMIN_USERNAME;
				header("Location: admin.php");

			} else {

				// Login failed: display an error message to the user.
				$results['errorMessage'] = "Incorrect username or password. Please try again.";
				require(TEMPLATE_PATH . "/admin/loginForm.php");

			}

		} else {

			// User has not posted the login form yet: display the form
			require(TEMPLATE_PATH . "/admin/loginForm.php");
		}
		
	}



	function logout() {

		unset($_SESSION['username']);
		header("Location: admin.php");
	}



	// This function lets the user create a new article.
	function newArticle() {

		$results = array();
		$results['pageTitle'] = "New Article";
		$results['formAction'] = "newArticle";

		if (isset($_POST['saveChanges'])) {

			// USer has posted the article edit form: save the new Article
			$article = new Article;
			$article->storeFormValues($_POST);
			$article->insert();
			
			// This checks that the 'image' element exists in the $_FILES array and, if it does exist, 
			// it calls the Article object's storeUploadedImage() method, passing in the 
			// $_FILES['image'] element, to store the image and create the thumbnail.
			if(isset( $_FILES['image'])) $article->storeUploadedImage($_FILES['image']);
			header ("Location: admin.php?status=changesSaved");

		} elseif (isset($_POST['cancel'])) {
			// User ha cancelled their edits: return to the article list.
			header("Location: admin.php");
		} else {

			 // User has not posted the article edit form yet: display the form
			  $results['article'] = new Article;
			  require( TEMPLATE_PATH . "/admin/editArticle.php" );
		}
	}

	


	function editArticle() {

		$results = array();
		$results['pageTitle'] = "Edit Article";
		$results['formAction'] = "editArticle";

		if (isset($_POST['saveChanges'])) {

			// User has posted the article edit form: save the article changes

			if (!$article = Article::getById((int)$_POST['articleId'])) {

				header("Location: admin.php?error=articleNotFound");
      			return;
			}

			$article->storeFormValues($_POST);
			if ( isset($_POST['deleteImage']) && $_POST['deleteImage'] == "yes" ) $article->deleteImages();
			$article->update();
			if ( isset( $_FILES['image'] ) ) $article->storeUploadedImage( $_FILES['image'] );
			header("Location: admin.php?status=changesSaved");
		} elseif (isset($_POST['cancel'])) {

			// User has cancelled their edits: return to the article list
    		header("Location: admin.php");
		} else {

			// User has not posted the article edit form yet: display the form
    		$results['article'] = Article::getById((int)$_GET['articleId']);
    		require(TEMPLATE_PATH . "/admin/editArticle.php");
		}
	}




	function deleteArticle() {
 
	  if (!$article = Article::getById((int)$_GET['articleId'])) {
	    header("Location: admin.php?error=articleNotFound");
	    return;
	  }
	 
	  $article->deleteImages();
	  $article->delete();
	  header("Location: admin.php?status=articleDeleted");
	}




	function listArticles() {
	  $results = array();
	  $data = Article::getList();
	  $results['articles'] = $data['results'];
	  $results['totalRows'] = $data['totalRows'];
	  $results['pageTitle'] = "All Articles";
	 
	  if ( isset( $_GET['error'] ) ) {
	    if ( $_GET['error'] == "articleNotFound" ) $results['errorMessage'] = "Error: Article not found.";
	  }
	 
	  if ( isset( $_GET['status'] ) ) {
	    if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
	    if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Article deleted.";
	  }
	 
	  require( TEMPLATE_PATH . "/admin/listArticles.php" );
	}
	

?>