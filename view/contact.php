<?php $title = 'Jean Forteroche | Contact'; ?>

<?php ob_start(); ?>

<!-- La page de contact présente des coordonnées et un formulaire pour contacter l'auteur  -->
<main id="main-contact">

    <section id="section-contact-informations">
        <h2>Par courrier</h2>
        <div>
            <p>Editions Grand Nord</p>
            <p>A l'attention de Jean Forteroche</p>
            <p>12, rue de la Plume</p>
            <p>1234 Ireki</p>
        </div>
    </section>

    <section id="section-contact-form">
    
        <div>
            <h2>Formulaire de contact</h2>

            <form method="post" action="index.php?action=send-mail">
                <div>
                    <label for="contact-name">Votre nom :</label>
                    <input type="text" id="contact-name" name="contact-name" required>
                </div>
                <div>
                    <label for="contact-mail">Votre adresse e-mail :</label>
                    <input type="email" id="contact-mail" name="contact-mail" required>
                </div>
                <div>
                    <label for="contact-subject">Sujet de votre message :</label>
                    <input type="text" id="contact-subject" name="contact-subject" required>
                </div>
                <div>
                    <label for="contact-message">Votre message :</label>
                    <textarea id="contact-message" name="contact-message" required></textarea> 
                </div>
                <div>
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </div>

        <!-- Gestion des messages de confirmation et d'erreur -->
        <?php if(isset($_GET['message_contact'])) {

            if($_GET['message_contact'] == 'ok') { ?>
                <p>Votre message a bien été envoyé.</p>
            <?php } elseif($_GET['message_contact'] == 'error') { ?>
                <p>Une erreur est survenue. Votre message n'a pas pu être envoyé. Veuillez réessayer plus tard.</p>
            <?php }

        } ?>
    
    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>