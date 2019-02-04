<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    //foreach ($_FILES["img"]["error"] as $key => $error) {
    //    if ($error == UPLOAD_ERR_OK) {
    //        $tmp_name = $_FILES["img"]["tmp_name"][$key];
    //        // basename() peut empêcher les attaques de système de fichiers;
    //        // la validation/assainissement supplémentaire du nom de fichier peut être approprié
    //        $name = basename($_FILES["img"]["name"][$key]);
    //        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    //    }
    //}
    if(isset($_FILES["img"])){
        $file = $_FILES["img"];
        $uploads_dir = "/uploads";

        $fileName = basename($file["name"]);
        $fileType = $file["type"];
        $fileSize = $file["size"];
        $fileTmpName = $file["tmp_name"];
        $fileError = $file["error"];

        if($fileError == 0){
            move_uploaded_file($fileTmpName, "$uploads_dir/$fileName");

            
        }
    }
}

require "views/postForm.php";