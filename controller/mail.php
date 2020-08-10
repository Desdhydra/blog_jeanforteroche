<?php

// Initialisation de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('PHPMailer/src/Exception.php');
require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');

class Mail {

    public function sendPassword($userEmail, $randomPassword) {

        // Création d'une instance d'objet PHPMailer (on lui passe l'argument "true" pour la gestion des exceptions)
        $phpMailer = new PHPMailer(true);

        try {

            // Paramètres du serveur
            $phpMailer->isSMTP();
            $phpMailer->Host = 'smtp.ionos.fr';
            $phpMailer->SMTPAuth = true;
            $phpMailer->SMTPSecure = 'tls';
            $phpMailer->Username = '';
            $phpMailer->Password = '';
            $phpMailer->Port = 587;
            
            // Personnalisation de l'e-mail
            $phpMailer->setFrom('blog-admin@audrey-joachim.com', 'Blog - Billet simple pour l\'Alaska');
            $phpMailer->addAddress($userEmail, 'Jean Forteroche');
            $phpMailer->isHTML(true);
            $phpMailer->Subject = '[Blog - Billet simple pour l\'Alaska] Votre nouveau mot de passe';
            $phpMailer->Body = 'Bonjour Jean Forteroche,<br />Voici votre nouveau mot de passe : ' . $randomPassword . '<br />Pour des raisons de sécurité, nous vous conseillons vivement de modifier ce mot de passe lors de votre prochaine connexion.<br />Cordialement, l\'administration du blog';
            $phpMailer->AltBody = 'Bonjour Jean Forteroche. Voici, entre crochets, votre nouveau mot de passe : [' . $randomPassword . ']. Pour des raisons de sécurité, nous vous conseillons vivement de modifier ce mot de passe lors de votre prochaine connexion. Cordialement, l\'administration du blog';
        
            // Envoi de l'e-mail
            $phpMailer->send();

            header('Location: http://localhost/jeanforteroche/index.php?action=link_connection&message_newpassword=ok');

        } catch (Exception $e) {

            // Gestion des exceptions
            header('Location: http://localhost/jeanforteroche/index.php?action=link_forgotten_password&message_newpassword=error');

        }

    }

}