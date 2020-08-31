<?php $title = 'Jean Forteroche | Changement d\'adresse e-mail'; ?>

<?php ob_start(); ?>

<h2>Changement d'adresse e-mail</h2>

<!-- Gestion des messages de confirmation et d'erreur -->
<section>

    <?php if(isset($_GET['message_changemail'])) {
        
        if($_GET['message_changemail'] == 'no_user') { ?>
            <p class="message-error">Ces identifiants sont erronés.</p>
        <?php } elseif($_GET['message_changemail'] == 'ok') { ?>
            <p class="message-success">Votre adresse e-mail a bien été modifiée.</p>
        <?php } elseif($_GET['message_changemail'] == 'error') { ?>
            <p class="message-error">Une erreur est survenue. Votre adresse e-mail n'a pas pu être modifiée. Veuillez réessayer plus tard.</p>
        <?php }

    } ?>

</section>

<!-- La page de changement d'adresse e-mail contient un formulaire pour définir une nouvelle adresse e-mail -->
<section class="section-admin-change">
    <form method="post" action="index.php?action=change-mail">
        <div>
            <label for="changemail-oldmail">Ancienne adresse e-mail :</label>
            <input type="email" id="changemail-oldmail" name="changemail-oldmail" required>
        </div>
        <div>
            <label for="changemail-newmail">Nouvelle adresse e-mail :</label>
            <input type="email" id="changemail-newmail" name="changemail-newmail" required>
        </div>
        <div>
            <label for="changemail-password">Votre mot de passe :</label>
            <input type="password" id="changemail-password" name="changemail-password" required>
        </div>
        <input type="submit" value="Envoyer">
    </form>
</section>

<?php $adminContent = ob_get_clean(); ?>

<?php require('admin_template.php'); ?>