<?php

require('mail.php');
require('model/user_manager.php');

class User {

    // Méthode qui permet d'authentifier un utilisateur enregistré
    public function signIn($userEmail, $userPassword) {

        $userEmail = htmlspecialchars($userEmail);
        $userPassword = htmlspecialchars($userPassword);

        $userManager = new UserManager;
        $user = $userManager->getUser($userEmail);

        if($userPassword == $user['user_password']) {

            $_SESSION['status'] = 'authenticated'; 
            header('Location: http://localhost/jeanforteroche/index.php?action=link_home');

        } else {
            header('Location: http://localhost/jeanforteroche/index.php?action=link_connection&message_connection=error');
        }

    }

    public function newPassWord($userEmail) {

        $userEmail = htmlspecialchars($userEmail);
        $randomPassword = rand(1000000, 999999999);

        $userManager = new UserManager;
        $passwordChanged = $userManager->newRandomPassword($userEmail, $randomPassword);

        if($passwordChanged) {

            $mail = new Mail;
            $mail->sendPassword($userEmail, $randomPassword);

        } else {

            header('Location: http://localhost/jeanforteroche/index.php?action=link_forgotten_password&message_newpassword=error');

        }

    }

}