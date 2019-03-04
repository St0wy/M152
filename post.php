<?php
/**
 * Page d'envois des medias
 * post.php
 *
 * PHP Version 7.2.10
 * 
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 */ 

require_once "model/postModel.php";
require_once "model/mediaModel.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    define("UPLOAD_PATH", realpath(dirname(__FILE__)) . "/uploads");

    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
    $postId = savePost($comment);
    $file = $_FILES["uploadedFile"];
    foreach ($file["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $fileType = $file["type"][$key];
            $allowedTypes = array("image/gif", "image/png", "image/jpeg", "video/mp4", "audio/mpeg");
            if(in_array($fileType, $allowedTypes)){
                $tmp_name = $file["tmp_name"][$key];
                $fileName = basename($file["name"][$key]);
                $temp = explode(".", $fileName);
                $newFileName = array_values($temp)[0] . round(microtime(true)) . rand() . '.' . end($temp);

                move_uploaded_file($tmp_name, UPLOAD_PATH . "/$newFileName");
                saveMedia($newFileName, $fileType, $postId);
            }
        }
    }
    header("Location:index.php");
}

require "views/postView.php";