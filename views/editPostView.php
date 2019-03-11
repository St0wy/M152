<?php
/**
 * Vue de la page de modification des posts
 * views/deletePostView.php
 *
 * PHP Version 7.2.10
 * 
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 */ 

$pageTitle   = "Edit Post";
include "header.php";
?>
<form action="./editPost.php" method="post">
    <input type="text" name="comment" id="comment" value="<?php echo $postToEdit["comment"]; ?>">
    <input type="hidden" name="idPostToEdit" value="<?php echo $idPostToEdit; ?>">
    <input type="hidden" name="action" value="comment">
    <button type="submit" value="submit" name="submit">Submit</button>
</form>
</body>

</html>