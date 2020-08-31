<?php

require('model/user_manager.php');

class User {

    // Méthode qui permet d'authentifier un utilisateur enregistré
    public function signIn($userEmail, $userPassword) {

        $userEmail = htmlspecialchars($userEmail);
        $userPassword = htmlspecialchars($userPassword);

        $userManager = new UserManager;
        $user = $userManager->getUser($userEmail);

        if(md5($userPassword) == $user['user_password']) {

            $_SESSION['status'] = 'authenticated'; 
            header('Location: http://localhost/jeanforteroche/index.php?action=link_home');

        } else {
            header('Location: http://localhost/jeanforteroche/index.php?action=link_connection&message_connection=error');
        }

    }

    // Méthode qui permet de créer un nouveau mot de passe aléatoire
    public function newPassword($userEmail) {

        $userEmail = htmlspecialchars($userEmail);
        $randomPassword = rand(1000000, 999999999);

        $userManager = new UserManager;
        $passwordChanged = $userManager->updatePassword($userEmail, $randomPassword);

        if($passwordChanged) {

            require('mail.php');
            $mail = new Mail;
            $mail->sendPassword($userEmail, $randomPassword);

        } else {

            header('Location: http://localhost/jeanforteroche/index.php?action=link_forgotten_password&message_newpassword=error');

        }

    }

    // Méthode qui permet de modifier l'adresse e-mail d'un utilisateur enregistré
    public function changeEmail($oldEmail, $newEmail, $userPassword) {

        $oldEmail = htmlspecialchars($oldEmail);
        $newEmail = htmlspecialchars($newEmail);
        $userPassword = htmlspecialchars($userPassword);

        $userManager = new UserManager;

        // On vérifie d'abord qu'il y ait un utilisateur correspondant à l'ancienne adresse e-mail
        $user = $userManager->getUser($oldEmail);
        if(empty($user)) {
            header('Location: http://localhost/jeanforteroche/index.php?action=link_changemail&message_changemail=no_user');
        } else {

            // On vérifie ensuite si les identifiants correspondent
            if(md5($userPassword) == $user['user_password']) {

                $emailChanged = $userManager->updateEmail($newEmail, $user['id']);

                if($emailChanged) {
                    header('Location: http://localhost/jeanforteroche/index.php?action=link_changemail&message_changemail=ok');
                } else {
                    header('Location: http://localhost/jeanforteroche/index.php?action=link_changemail&message_changemail=error');
                }

            } else {
                header('Location: http://localhost/jeanforteroche/index.php?action=link_changemail&message_changemail=no_user');
            }

        }

    }

    // Méthode qui permet de modifier le mot de passe d'un utilisateur enregistré
    public function changePassword($userEmail, $password, $repeatPassword) {
        
        $userEmail = htmlspecialchars($userEmail);
        $password = htmlspecialchars($password);
        $repeatPassword = htmlspecialchars($repeatPassword);

        $userManager = new UserManager;

        // On vérifie d'abord qu'il y ait un utilisateur correspondant à l'adresse e-mail
        $user = $userManager->getUser($userEmail);
        if(empty($user)) {
            header('Location: http://localhost/jeanforteroche/index.php?action=link_changepassword&message_changepassword=no_user');
        } else {

            // On vérifie ensuite si les deux mots de passe saisis sont identiques
            if($password == $repeatPassword) {

                $passwordChanged = $userManager->updatePassword($userEmail, $password);
                
                if($passwordChanged) {
                    header('Location: http://localhost/jeanforteroche/index.php?action=link_changepassword&message_changepassword=ok');
                } else {
                    header('Location: http://localhost/jeanforteroche/index.php?action=link_changepassword&message_changepassword=error');
                }

            } else {
                header('Location: http://localhost/jeanforteroche/index.php?action=link_changepassword&message_changepassword=no_match');
            }

        }

    }

}