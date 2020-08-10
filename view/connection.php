<?php $title = 'Jean Forteroche | Connexion'; ?>

<?php ob_start(); ?>

<!-- La page de connexion contient un formulaire pour introduire ses identifiants afin d'accéder à l'interface d'administration -->
<main>

    <h1>Connexion au panneau d'administration</h1>

    <div>
        <form method="post" action="index.php?action=sign_in">
            <div>
                <label for="signin-mail">Votre adresse e-mail :</label>
                <input type="email" id="signin-mail" name="signin-mail" required>
            </div>
            <div>
                <label for="signin-password">Votre mot de passe :</label>
                <input type="password" id="signin-password" name="signin-password" required>
            </div>
            <div>
                <input type="submit" value="Se connecter">
            </div>
        </form>
        <a href="index.php?action=link_forgotten_password">Mot de passe oublié ?</a>
    </div>

    <!-- Gestion des messages d'erreur -->

    <?php if(isset($_GET['message_connection']) && ($_GET['message_connection'] == 'error')) { ?>
        <div>
            <p>Ces identifiants sont erronés.</p>
        </div>
    <?php } ?>

    <?php if(isset($_GET['message_newpassword']) && ($_GET['message_newpassword'] == 'ok')) { ?>
        <div>
            <p>Un nouveau mot de passe vous a été envoyé par e-mail.</p>
        </div>
    <?php } ?>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>