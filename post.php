<?php

require_once "model/postModel.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    define("UPLOAD_PATH", realpath(dirname(__FILE__)) . "/uploads");

    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
    $postId = savePost($comment);
    $file = $_FILES["uploadedFile"];

    foreach ($file["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $file["tmp_name"][$key];
            $fileName = basename($file["name"][$key]);
            $fileType = $file["type"][$key];
            move_uploaded_file($tmp_name, UPLOAD_PATH . "/$fileName");
            saveMedia($fileName, $fileType, $postId);
        }
    }
}

require "views/postView.php";