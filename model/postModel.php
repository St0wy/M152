<?php
/**
 * Fonctions de gestions de la table post
 * model\postModel.php
 *
 * PHP Version 7.2.10
 *
 * @category File
 * @package  File
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://127.0.0.1/MiniForum/public/php
 */

require_once 'dbconnection.php';

/**
 * Save the post into the db
 *
 * @param mixed $comment   Description of the image  
 * @param mixed $mediaType Type of the uploaded media
 * @param mixed $mediaName Name of the uploaded media
 */
function savePost($comment)
{
    $result = null;
    try {
        $db = connectDb();
        $sql = "INSERT INTO post (comment) VALUES (:comment)";
        $request = $db->prepare($sql);
        $arrayToExecute = array(
            'comment' => $comment
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
 * Get all the posts.
 *
 * @return mixed Array of the posts or null.
 */
function getPosts()
{
    $result = null;
    try {
        $db = connectDb();
        $sql = "SELECT idPost, comment, datePost FROM post ORDER BY datePost DESC";

        $request = $db->prepare($sql);
        if ($request->execute()) {
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (Exeption $e) {
        echo $e->getMessage();
    }
    
    return $result;
}

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