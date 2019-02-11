<?php

require_once "model/postModel.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    define("UPLOAD_PATH", realpath(dirname(__FILE__)) . "/uploads");

    $comment = filter_input(INPUT_POST, 'imageDescription', FILTER_SANITIZE_STRING);
    $postId = savePost($comment);

    foreach ($_FILES["img"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["img"]["tmp_name"][$key];
            $fileName = basename($_FILES["img"]["name"][$key]);
            $fileType = $_FILES["img"]["type"][$key];
            move_uploaded_file($tmp_name, UPLOAD_PATH . "/$fileName");
            saveMedia($fileName, $fileType, $postId);
        }
    }
}

require "views/postView.php";