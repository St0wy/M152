<?php
/**
 * Fonctions de gestions de la table media
 * model\mediaModel.php
 *
 * PHP Version 7.2.10
 *
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 */

/**
 * saveMedia
 *
 * @param  mixed $fileName
 * @param  mixed $type
 * @param  mixed $idPost
 *
 * @return void
 */
function saveMedia($fileName, $type, $idPost) 
{
    $result = null;
    try {
        $db = connectDb();
        $sql = "INSERT INTO media (fileName, type, idPost)" .
            " VALUES (:fileName, :type, :idPost)";
        $request = $db->prepare($sql);
        $arrayToExecute = array(
            "fileName" => $fileName,
            "type" => $type,
            "idPost" => $idPost
        );

        if ($request->execute($arrayToExecute)) {
            $result = $db->lastInsertId();
        }
    } catch (Exeption $e) {
        echo $e->getMessage();
    }

    return $result;
}

/**
 * getMediaFromIdPost
 *
 * @param  mixed $idPost
 *
 * @return void
 */
function getMediaFromIdPost($idPost)
{
    $result = null;
    try {
        $db = connectDb();
        $sql = "SELECT idMedia, fileName, type FROM media WHERE idPost=:idPost";

        $request = $db->prepare($sql);
        $arrayToExecute = array("idPost" => $idPost);

        if ($request->execute($arrayToExecute)) {
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (Exeption $e) {
        echo $e->getMessage();
    }

    return $result;
}

/**
 * editMedia
 *
 * @return void
 */
function editMedia(){
    
}

/**
 * deleteMedia
 *
 * @param  mixed $idMedia
 *
 * @return void
 */
function deleteMedia($idMedia){
    $result = null;
    try {
        $db = connectDb();
        $sql = "DELETE FROM media WHERE idMedia = :idMedia";

        $request = $db->prepare($sql);
        $arrayToExecute = array("idMedia" => $idMedia);

        if ($request->execute($arrayToExecute)) {
            $result = true;
        }
    } catch (Exeption $e) {
        echo $e->getMessage();
        $result = null;
    }

    return $result;
}

/**
 * deleteMediaFromIdPost
 *
 * @param  mixed $idPost
 *
 * @return void
 */
function deleteMediaFromIdPost($idPost){
    $result = null;
    try {
        $db = connectDb();
        $sql = "DELETE FROM media WHERE idPost = :idPost";

        $request = $db->prepare($sql);
        $arrayToExecute = array("idPost" => $idPost);

        if ($request->execute($arrayToExecute)) {
            $result = true;
        }
    } catch (Exeption $e) {
        echo $e->getMessage();
        $result = null;
    }

    return $result;
}