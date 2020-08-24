<?php $title = 'Jean Forteroche | Erreur'; ?>

<?php ob_start(); ?>

<main class="main">

    <section class="section-errors">
        <h2>Erreur 403 - Forbidden</h2>
        <p>Une erreur est survenue. L'accès à cette page est interdit.<p>
    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>