<?php $title = 'Jean Forteroche | Accueil'; ?>

<?php ob_start(); ?>

<main>

    <section>Image et titre</section>

    <section>Description du projet</section>

    <section>Trois dernières actualités</section>


</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>