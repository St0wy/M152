<?php
/**
 * Page de suppresion des posts
 * deletePost.php
 *
 * PHP Version 7.2.10
 * 
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 */ 

require_once "model/postModel.php";
require_once "model/mediaModel.php";

define("UPLOAD_PATH", realpath(dirname(__FILE__)) . "/uploads");
$method = $_SERVER["REQUEST_METHOD"];
$idPostToDelete = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if($method === "POST"){
    $button = filter_input(INPUT_POST, 'button', FILTER_SANITIZE_STRING);
    if($button == "accept"){
        $idPostToDelete = filter_input(INPUT_POST, 'idPostToDelete', FILTER_VALIDATE_INT);
        if(!empty($idPostToDelete)){
            //Delete the medias from the folder
            $medias = getMediaFromIdPost($idPostToDelete);
            foreach ($medias as $media) {
                $file = UPLOAD_PATH  . "/" . $media["fileName"];
                if(file_exists($file)){
                    unlink($file);
                }
            }
            //It's important to delete the media before deleting the post
            deleteMediaFromIdPost($idPostToDelete);
            deletePost($idPostToDelete);
        }
        header("Location:index.php");
    }
    elseif($button == "cancel"){
        header("Location:index.php");
    }
}

require "views/deletePostView.php";