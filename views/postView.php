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
<body>
    <?php include "navbar.php" ?>
    <div class="flex-container">
        <div class="upload upload-left">
            <h1>Images</h1>
            <form action="./post.php" method="post" enctype="multipart/form-data">
                Select a file: <input type="file" name="uploadedFile[]" accept="image/gif, image/png, image/jpg" multiple><br>
                <label for="comment">Description de l'image</label>
                <input type="text" name="comment" id="comment"> <br>
                <button type="submit">Submit</button>
            </form>

            <h1>Audio</h1>
            <form action="./post.php" method="post" enctype="multipart/form-data">
                Select a file: <input type="file" name="uploadedFile[]" accept="audio/mpeg" multiple><br>
                <label for="comment">Description du son</label>
                <input type="text" name="comment" id="comment"> <br>
                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="upload upload-right">
            <h1>Videos</h1>
            <form action="./post.php" method="post" enctype="multipart/form-data">
                Select a file: <input type="file" name="uploadedFile[]" accept="video/mp4" multiple><br>
                <label for="comment">Description de la video</label>
                <input type="text" name="comment" id="comment"> <br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>