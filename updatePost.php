<?php
/**
 * Page de modification des posts
 * updatePost.php
 *
 * PHP Version 7.2.10
 * 
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 */ 

require_once "model/postModel.php";
require_once "model/mediaModel.php";

$idPostToUpdate = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$medias = getMediaFromIdPost($idPostToUpdate);

require "views/updatePostView.php";