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
 * @param mixed $title       Title of the post.
 * @param mixed $description Description of the post.
 * @param mixed $idUser      Id of the user that posted the post.
 *
 * @return void
 */
function savePost($comment, $mediaType, $mediaName)
{
    try {
        $db = connectDb();
        $sql = "INSERT INTO post (comment, mediaType, mediaName)" .
            " VALUES (:comment, :mediaType, :mediaName)";
        $request = $db->prepare($sql);
        $arrayToExecute = array(
            'comment' => $comment,
            'mediaType' => $mediaType,
            'mediaName' => $mediaName,
        );

        if ($request->execute($arrayToExecute)) {
            return $db->lastInsertId();
        } else {
            return null;
        }
    } catch (Exeption $e) {
        echo $e->getMessage();
        return null;
    }

    return $request->fetch();
}