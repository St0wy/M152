<?php
/**
 * Vue de la page de suppresion des posts
 * views/deletePostView.php
 *
 * PHP Version 7.2.10
 * 
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 */ 

$pageTitle = "Delete Post";
include "header.php";
?>
    <form action="./deletePost.php" method="post">
        <p>Voulez-vous supprimer votre post?</p>
        <input type="hidden" name="idPostToDelete" value="<?php echo $idPostToDelete; ?>">
        <button type="submit" value="accept" name="button">Accept</button>
        <button type="submit" value="cancel" name="button">Cancel</button>
    </form>
</body>
</html>