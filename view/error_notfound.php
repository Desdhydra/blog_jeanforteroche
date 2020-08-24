<?php $title = 'Jean Forteroche | Erreur'; ?>

<?php ob_start(); ?>

<main class="main">

    <section class="section-errors">
        <h2>Erreur 404 - Not found</h2>
        <p>Une erreur est survenue. La page que vous essayez de consulter n'existe pas.<p>
    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>