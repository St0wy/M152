<?php
/**
 * Timeline du blog
 * index.php
 *
 * PHP Version 7.2.10
 * 
 * @author Fabian Huber <fabian.hbr@eduge.ch>
 */ 

require_once "model/postModel.php";
$posts = getPosts();

require "views/blogView.php";