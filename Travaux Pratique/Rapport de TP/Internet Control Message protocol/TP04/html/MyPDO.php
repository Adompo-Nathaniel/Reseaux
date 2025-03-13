<?php
session_start();
if (empty($_SESSION['identifiant'])) {
      header('Location: login.php');
}
include_once "../config/DBConfig.php";
//methode static getInstance qui permet de retourner ou de creer une instance de la classe PDO permettant de se connecter a la base de donnees
class MyPDO extends PDO {
    private static ?PDO $instance = null;
    public static function getInstance() {
        if (self::$instance == null) {
            try {
                self::$instance = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
        return self::$instance;
    }
}