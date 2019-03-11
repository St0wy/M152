<?php
/**
 * Page de modification des posts
 * editPost.php
 *
 * PHP Version 7.2.10
 * 
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 */ 

require_once "model/postModel.php";
require_once "model/mediaModel.php";

define("UPLOAD_PATH", realpath(dirname(__FILE__)) . "/uploads");
$method = $_SERVER["REQUEST_METHOD"];
$idPostToEdit = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$postToEdit = 0;

if ($method === "POST") {
    $action = filter_input(INPUT_POST, 'action', FILTER_VALIDATE_INT);
    var_dump($action);
    if($action === "comment"){
        $idPostToEdit = filter_input(INPUT_POST, 'idPostToEdit', FILTER_VALIDATE_INT);
        $comment = filter_input(INPUT_POST, 'comment', FILTER_VALIDATE_INT);
        updatePost($idPostToEdit, $comment);
        //header("Location:index.php");
    }
}
else{
    $postToEdit = getPostFromId($idPostToEdit);
    var_dump($postToEdit);
}


require "views/editPostView.php";