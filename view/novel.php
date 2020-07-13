<?php $title = 'Jean Forteroche | Le roman'; ?>

<?php ob_start(); ?>

<main>

    <section>Boucles d'articles</section>

    <section>Pagination</section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>