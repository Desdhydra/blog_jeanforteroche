<?php $title = 'Jean Forteroche | Erreur'; ?>

<?php ob_start(); ?>

<main>

    <section>
        <h1>Erreur 404 - Not found</h1>
        <p>Une erreur est survenue. La page que vous essayez de consulter n'existe pas.<p>
    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>