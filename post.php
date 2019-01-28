<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_FILES["img"])){
        $files = $_FILES["img"];
        //TODO: Get file info (name, type ect)
    }
}

require "views/postForm.php";