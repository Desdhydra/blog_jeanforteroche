<?php

class Database {

    // Méthode statique qui permet de se connecter à la base de données
    public static function dbConnect() {

        try {
	        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
            return $db;
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

    }

}