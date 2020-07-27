<?php

require('model/user_manager.php');

class User {

    public function signIn($userEmail, $userPassword) {

        $userEmail = htmlspecialchars($userEmail);
        $userPassword = htmlspecialchars($userPassword);

        $userManager = new UserManager;
        $checkPassword = $userManager->getUser($userEmail, md5($userPassword));

        if($checkPassword) {

            // Ajouter les variables de session et de cookies
            header('Location: http://localhost/jeanforteroche/index.php?action=link_home');

        } else {

            header('Location: http://localhost/jeanforteroche/index.php?action=link_connection&message_connection=error');

        }

    }

}