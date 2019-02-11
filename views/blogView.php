<?php
$pageTitle = "My Blog";
include "header.php";
?>
<body>
<?php include "navbar.php"?>
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
            <?php
            $allowedImageType = array('gif', 'png', 'jpg');
            $allowedVideoType = array("mp4");
            //In case the extention is in captial (.PNG ect)
            $loweredFileName = strtolower($media["fileName"]);
            $ext = pathinfo($loweredFileName, PATHINFO_EXTENSION);
            if (in_array($ext, $allowedImageType)) {
            ?>
            <img src="./uploads/<?php echo ($media["fileName"]); ?>">
            <?php
            }
            elseif (in_array($ext, $allowedVideoType)) {
            ?>
            <video controls>
                <source src="./uploads/<?php echo $media["fileName"]; ?>" type="<?php echo $media["type"]; ?>">
                Your browser does not support the video tag.
            </video> 
            <?php } ?>
            <p class="img-description"><?php echo ($post["comment"]); ?></p>
        </div>
        <?php
    }
}
?>
    </div>
</div>
</body>
</html>