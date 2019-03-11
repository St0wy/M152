<?php
/**
 * Fonctions de gestions de la table post
 * model\postModel.php
 *
 * PHP Version 7.2.10
 *
 * @author   Fabian Huber <fabian.hbr@eduge.ch>
 */

require_once 'dbconnection.php';

/**
 * Save the post into the db
 *
 * @param string $comment   Description of the image
 */
function savePost($comment)
{
    $result = null;
    try {
        $db = connectDb();
        $sql = "INSERT INTO post (comment) VALUES (:comment)";
        $request = $db->prepare($sql);
        $arrayToExecute = array(
            'comment' => $comment,
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

/**
 * getPostFromId
 *
 * @param  int $idPost
 *
 * @return mixed
 */
function getPostFromId($idPost)
{
    $result = null;
    try {
        $db = connectDb();
        $sql = "SELECT idPost, datePost, comment FROM post WHERE idPost=:idPost";

        $request = $db->prepare($sql);
        $arrayToExecute = array("idPost" => $idPost);

        if ($request->execute($arrayToExecute)) {
            //To fix a wierd bug
            $fetch = $request->fetchAll(PDO::FETCH_ASSOC);
            if($fetch == null){
                $result = $fetch;
            }
            else{
                $result = $fetch[0];
            }
        }
    } catch (Exeption $e) {
        echo $e->getMessage();
    }

    return $result;
}


/**
 * updatePost
 *
 * @return mixed
 */
function updatePost($idPost, $comment){
    $result = null;
    try {
        $db = connectDb();
        $sql = "UPDATE post SET comment = :comment WHERE idPost = :idPost";
        $request = $db->prepare($sql);
        $arrayToExecute = array(
            'comment' => $comment,
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
 * deletePost
 *
 * @param  mixed $idPost id of the post you want to delete
 *
 * @return mixed
 */
function deletePost($idPost)
{
    $result = null;
    try {
        $db = connectDb();
        $sql = "DELETE FROM post WHERE idPost = :idPost";

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