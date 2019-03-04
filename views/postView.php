<?php
/**
 * Formulaire d'envois des medias
 * views/postViews.php
 *
 * PHP Version 7.2.10
 *
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 */
$pageTitle = "Posts";
include "header.php";
?>
    <div class="flex-container">
        <div>
            <h1>Uploadez un post!</h1>
            <form action="./post.php" method="post" enctype="multipart/form-data">
                Select a file: <input type="file" name="uploadedFile[]" accept="image/gif, image/png, image/jpg, video/mp4, audio/mpeg" multiple><br>
                <label for="comment">Description du post</label>
                <input type="text" name="comment" id="comment"> <br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>