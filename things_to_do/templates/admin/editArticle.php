<?php include "templates/include/header.php" ?>
 
 
 		<script>
 
      // Prevents file upload hangs in Mac Safari
      // Inspired by http://airbladesoftware.com/notes/note-to-self-prevent-uploads-hanging-in-safari
 
      function closeKeepAlive() {
        if ( /AppleWebKit|MSIE/.test( navigator.userAgent) ) {
          var xhr = new XMLHttpRequest();
          xhr.open( "GET", "/ping/close", false );
          xhr.send();
        }
      }
 
      </script>
 
 
 
 
      <div id="adminHeader">
        <h2>Things to do Adder</h2>
        <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
      </div>
 
      <h1><?php echo $results['pageTitle']?></h1>
 
      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post" enctype="multipart/form-data" onsubmit="closeKeepAlive()">
        <input type="hidden" name="articleId" value="<?php echo $results['article']->id ?>"/>
 
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
        <ul>
 
          <li>
            <label for="title">Thing To Do Title</label>
            <input type="text" name="title" id="title" placeholder="Name of the Thing To Do" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['article']->title )?>" />
          </li>
  
          <li>
            <label for="content">Thing To Do Description</label>
            <textarea name="content" id="content" placeholder="The description of Thing To Do " required maxlength="100000" style="height: 30em;"><?php echo htmlspecialchars( $results['article']->content )?></textarea>
          </li>
  		  
          <li>
            <label for="publicationDate">Publication Date</label>
            <input type="date" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $results['article']->publicationDate ? date( "Y-m-d", $results['article']->publicationDate ) : "" ?>" />
          </li>
          
          <?php if ( $results['article'] && $imagePath = $results['article']->getImagePath() ) { ?>
          <li>
            <label>Current Image</label>
            <img id="articleImage" src="<?php echo $imagePath ?>" alt="Article Image" />
          </li>
 
          <li>
            <label></label>
            <input type="checkbox" name="deleteImage" id="deleteImage" value="yes"/ > <label for="deleteImage">Delete</label>
          </li>
          <?php } ?>
 
          <li>
            <label for="image">New Image</label>
            <input type="file" name="image" id="image" placeholder="Choose an image to upload" maxlength="255" />
          </li>
 
 
        </ul>
 
        <div class="buttons">
          <input type="submit" name="saveChanges" value="Save Changes" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>
 
      </form>
 
<?php if ( $results['article']->id ) { ?>
      <p><a href="admin.php?action=deleteArticle&amp;articleId=<?php echo $results['article']->id ?>" onclick="return confirm('Delete This Thing To Do ?')">Delete This Thing To Do </a></p>
<?php } ?>
 
<?php include "templates/include/footer.php" ?>