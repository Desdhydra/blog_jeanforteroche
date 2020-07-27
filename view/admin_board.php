<?php $title = 'Jean Forteroche | Panneau d\'administration | Accueil'; ?>

<?php ob_start(); ?>

<main>

    <section>Panneau d'administration</section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('admin_template.php'); ?>