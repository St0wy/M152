<?php
$pageTitle = "My Blog";
include "header.php";
?>
<body>
<?php include "navbar.php" ?>
<div class="flex-container">
    <div class="left-column">
        <div class="user-info">
            <img src="img/31-86.jpg" alt="naota" id="user-pic">
            <p id="blog-name">NOM DE VOTRE BLOG</p>
        </div>
    </div>
    <div class="right-column">
        <div class="welcome-message">
            <h1>WELCOME</h1>
        </div>

        <?php 
        foreach ($posts as $post) {
            $medias = getMediaFromIdPost($post["idPost"]);
            foreach ($medias as $media) {
            ?>
            <div class="post">
                <img src="./uploads/<?php echo($media["fileName"]); ?>">
                <p class="img-description"><?php echo($post["comment"]); ?></p>
            </div>
            <?php
            }
        }
        ?>
    </div>
</div>
</body>
</html>