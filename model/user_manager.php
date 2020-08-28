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

    // Méthode qui permet de mettre à jour l'adresse e-mail d'un utilisateur enregistré dans la base de données
    public function updateEmail($newEmail, $id) {

        $db = Database::dbConnect();
        $query = $db->prepare('UPDATE users SET email=:email WHERE id=:id');
        $emailChanged = $query->execute(array(
            'email' => $newEmail,
            'id' => $id
        ));
        return $emailChanged;

    }

    // Méthode qui permet de mettre à jour le mot de passe d'un utilisateur enregistré dans la base de données
    public function updatePassword($userEmail, $userPassword) {

        $db = Database::dbConnect();
        $query = $db->prepare('UPDATE users SET user_password=:user_password WHERE email=:email');
        $passwordChanged = $query->execute(array(
            'user_password' => md5($userPassword),
            'email' => $userEmail
        ));
        return $passwordChanged;

    }

    // Méthode qui permet de récupérer l'adresse e-mail de Jean Forteroche
    public function getAuthorEmail($id) {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT email from users WHERE id=:id');
        $query->execute(array('id' => $id));
        $result = $query->fetch();
        return $result;

    }
    
}