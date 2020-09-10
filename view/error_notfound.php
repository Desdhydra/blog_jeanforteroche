<?php $title = 'Jean Forteroche | Erreur'; ?>

<?php ob_start(); ?>

<main>

    <h2>Erreur 404 - Not found</h2>
    <section class="section-design section-error">
        <p>Une erreur est survenue. La page que vous essayez de consulter n'existe pas.<p>
    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>