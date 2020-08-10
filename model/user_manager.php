<?php

class UserManager {

    // Méthode qui permet de récupérer un utilisateur dans la base de données
    public function getUser($userEmail) {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT * from users WHERE email=:email');
        $query->execute(array('email' => $userEmail));
        $result = $query->fetch();
        return $result;

    }

    // Méthode qui permet d'attribuer un nouveau mot de passe généré aléatoirement
    public function newRandowPassword($userEmail, $randomPassword) {

        $db = Database::dbConnect();
        $query = $db->prepare('UPDATE users SET user_password=:user_password WHERE email=:email');
        $passwordChanged = $query->execute(array(
            'user_password' => md5($randomPassword),
            'email' => $userEmail
        ));
        return $passwordChanged;

    }
    
}