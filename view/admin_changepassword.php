<?php $title = 'Jean Forteroche | Changement de mot de passe'; ?>

<?php ob_start(); ?>

<!-- La page de changement de mot de passe contient un formulaire pour définir un nouveau mot de passe -->
<section class="section-admin-change">
    <h2>Changement de mot de passe</h2>
    <form method="post" action="index.php?action=change-password">
        <div>
            <label for="changepassword-mail">Votre adresse e-mail :</label>
            <input type="email" id="changepassword-mail" name="changepassword-mail" required>
        </div>
        <div>
            <label for="changepassword-pass">Nouveau mot de passe :</label>
            <input type="password" id="changepassword-pass" name="changepassword-pass" required>
        </div>
        <div>
            <label for="changepassword-repeat">Confirmez votre mot de passe :</label>
            <input type="password" id="changepassword-repeat" name="changepassword-repeat" required>
        </div>
        <input type="submit" value="Envoyer">
    </form>
</section>

<!-- Gestion des messages de confirmation et d'erreur -->
<section>

    <?php if(isset($_GET['message_changepassword'])) {
        
        if($_GET['message_changepassword'] == 'no_user') { ?>
            <p>Il n'y a pas d'utilisateur correspondant à cette adresse e-mail.</p>
        <?php } elseif($_GET['message_changepassword'] == 'no_match') { ?>
            <p>Les deux mots de passe saisis sont différents.</p>
        <?php } elseif($_GET['message_changepassword'] == 'error') { ?>
            <p>Une erreur est survenue. Votre mot de passe n'a pas pu être modifié. Veuillez réessayer plus tard.</p>
        <?php } elseif($_GET['message_changepassword'] == 'ok') { ?>
            <p>Votre mot de passe a été modifié avec succés.</p>
        <?php }

    } ?>

</section>

<?php $adminContent = ob_get_clean(); ?>

<?php require('admin_template.php'); ?>