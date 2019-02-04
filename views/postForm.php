<?php 
$pageTitle = "Posts";
include "header.php";
?>
<body>
    <?php include "navbar.php" ?>
    <form action="./post.php" method="post" enctype="multipart/form-data">
        Select a file: <input type="file" name="img[]"><br>
        <label for="imageDescription">Description de l'image</label>
        <input type="text" name="imageDescription" id="imageDescription"> <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>