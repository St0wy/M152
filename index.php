<?php

require_once "model/postModel.php";
$posts = getPosts();

require "views/blog.php";