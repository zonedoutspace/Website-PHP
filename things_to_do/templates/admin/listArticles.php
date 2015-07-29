<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
<body>

	<div id="container">
 
 	<div class="col-md-3">
	 	<div class="thumbnail" style="border-radius:0px; border:0px;">
	 		<a href="."><img id="logo" src="../things_to_do/images/article-images/logo.png" alt="Fiji Flower" /></a>
	 	</div>
 	</div>
 	
      <div id="adminHeader">
        <h2>Admin</h2>
        <h4>Admin Panel for Things To Do Section</h4>
        <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
      </div>
 
      <h1>All:Things To Do</h1>
      
      <a href="../things_to_do/templates/admin_mode.php">Edit Comment Section</a>
 	 <br><br>
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
 
<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>
 
      <table>
        <tr>
          <th>Publication Date</th>
          <th>Things To Do</th>
        </tr>
 
<?php foreach ( $results['articles'] as $article ) { ?>
 
        <tr onclick="location='admin.php?action=editArticle&amp;articleId=<?php echo $article->id?>'">
          <td><?php echo date('j M Y', $article->publicationDate)?></td>
          <td>
            <?php echo $article->title?>
          </td>
        </tr>
 
<?php } ?>
 
      </table>
 
 
      <p><?php echo $results['totalRows']?> thing<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>
 
      <p><a href="admin.php?action=newArticle">Add a New Thing To Do </a></p>
      <br>
      <a href="../things_to_do/templates/admin_mode.php">Edit Comment Section</a>
      
      
      
      
      
      
      
      
 
