<?php
/**
 * Vue de la page de modification des posts
 * views/updatePostView.php
 *
 * PHP Version 7.2.10
 * 
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 */ 

$pageTitle = "Update Post";
include "header.php";

?>
<h1>Modifiez votre post</h1>
<form action="./post.php" method="post" enctype="multipart/form-data">
    Select a file to add to the post: <input type="file" name="uploadedFile[]" accept="image/gif, image/png, image/jpg" multiple><br>
    <label for="comment">Nouvelle description de l'image</label>
    <input type="text" name="comment" id="comment"> <br>

    <?php
    foreach ($medias as $media) {
        
    }
    ?>

    <input type="hidden" name="idPostToUpdate" value="<?php echo $idPostToUpdate; ?>">
    <button type="submit">Submit</button>
</form>
</body>
</html>