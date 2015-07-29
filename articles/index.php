<?php

	// index.php script controls the display of the front-end pages of the site.

	require("config.php");

	// We store the $_GET['action'] parameter in a variable called $action, so that we can 
	// use the value later in the script.
	$action = isset($_GET['action']) ? $_GET['action'] : "";

	switch ($action) {

		case 'archive':
			archive();
			break;
		case 'viewArticle':
			viewArticle();
			break;
		default:
			homepage();
	}

	// This function displays a list of all the articles in the database. 
	// It does this by calling the getList() method of the Article class that we created earlier. 
	function archive() {

		$results = array();
		$data = Article::getList();
		$results['articles'] = $data['results'];
		$results['totalRows'] = $data['totalRows'];
		$results['pageTitle'] = "Article Archive | Widget News";
		require(TEMPLATE_PATH . "/archive.php");
	}


	// This function displays a single article page. It retrieves the ID of the article to 
	// display from the articleId URL parameter, then calls the Article class's getById() 
	// method to retrieve the article object, which it stores in the $results array for the template to use.
	function viewArticle() {

		if (!isset($_GET["articleId"]) || !$_GET["articleId"] ){

			homepage();
			return;
		}

		$results = array();
		$results['article'] = Article::getById ((int)$_GET["articleId"]);
		$results['pageTitle'] = $results['article']->title . " | Widget News";
		require(TEMPLATE_PATH . "/viewArticle.php");
	}
	


	// homepage(), displays the site homepage containing a list of up to HOMEPAGE_NUM_ARTICLES 
	// articles (5 by default).
	function homepage() {

		$results = array();
		$data = Article::getList(HOMEPAGE_NUM_ARTICLES);
		$results['articles'] = $data['results'];
		$results['totalRows'] = $data['totalRows'];
		$results['pageTitle'] = "Widget News";
		require(TEMPLATE_PATH . "/homepage.php");
	}
?>