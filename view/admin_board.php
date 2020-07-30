<?php ob_start(); ?>

<section>

    <h1>Panneau d'administration</h1>

</section>

<?php $adminContent = ob_get_clean(); ?>

<?php require('admin_template.php'); ?>