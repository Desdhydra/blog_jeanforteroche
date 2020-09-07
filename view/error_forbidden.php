<?php $title = 'Jean Forteroche | Erreur'; ?>

<?php ob_start(); ?>

<main class="main">

    <h2>Erreur 403 - Forbidden</h2>
    <section class="section-design section-error">
        <p>Une erreur est survenue. L'accès à cette page est interdit.<p>
    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>