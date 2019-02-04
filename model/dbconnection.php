<?php
/**
 * model\dbconnection.php
 * @author Fabian Huber
 * 31.08.2018
 * contient la fonctions et les donnees de connexion à la base de donnees
 */

/**
 * effectue la connexion à la base de données
 * @return PDO objet de connexion à la base de données
 */
function connectDb() {
    define("SERVER", "127.0.0.1");
    define("PSEUDO", "m152Admin");
    define("PWD", "123");
    define("DBNAME", "m152");

    static $db = null;

    if ($db === null) {
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $db = new PDO("mysql:host=" . SERVER . ";dbname=" . DBNAME, PSEUDO, PWD, $pdo_options);
            $db->exec('SET CHARACTER SET utf8');
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
        
    }
    return $db;
}