<?php

class UserManager {

    public function getUser($userEmail, $userPassword) {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT * from users WHERE email=:email AND user_password=:user_password');
        $query->execute(array(
            'email' => $userEmail,
            'user_password' => $userPassword
        ));
        $result = $query->fetch();
        return $result;

    }
    
}