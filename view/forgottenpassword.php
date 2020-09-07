<?php $title = 'Jean Forteroche | Récupération de mot de passe'; ?>

<?php ob_start(); ?>

<!-- La page de récupération de mot de passe contient un formulaire pour demander un nouveau mot de passe -->
<main>

    <section id="section-forgotten-password">
        
        <h2>Récupération de mot de passe</h2>
        <div class="section-design">
            <p>Veuillez saisir votre adresse e-mail ci-dessous afin que nous puissions vous envoyer un nouveau mot de passe</p>
            <form method="post" action="index.php?action=new_password">
                <div>
                    <label for="newpass-mail">Votre adresse e-mail :</label>
                    <input type="email" id="newpass-mail" name="newpass-mail" required>
                </div>
                <div>
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </div>
        
        <!-- Gestion des messages d'erreur -->
        <?php if(isset($_GET['message_newpassword']) && ($_GET['message_newpassword'] == 'error')) { ?>
            <div>
                <p class="message-error">Une erreur est survenue. Nous n'avons pas pu vous vous envoyer un nouveau mot de passe. Veuillez réessayer plus tard.</p>
            </div>
        <?php } ?>

    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>