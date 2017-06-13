<?php 
	
	include("includes/init.php");

    if(!$session->isSignedIn()) {
        redirectUser("login.php");
    }

?>

<?php

	if(empty($_GET['id'])) {
		redirectUser("photos.php");
	}

	$photo = Photo::find_by_id($_GET['id']);

	if($photo) {
		$photo->delete_photo();
		redirectUser("photos.php");
	} else {
		redirectUser("photos.php");
	}

?>