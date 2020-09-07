<?php $currentActiveAdminPage = 'admin-profile' ?>

<?php $adminTitle = 'Profil' ?>

<?php ob_start(); ?>

<section id="section-profile" class="section-design">
    <div>
        <p>Modifier mon adresse e-mail</p>
        <a href="index.php?action=link_changemail">Modifier</a>
    </div>
    <div>
        <p>Modifier mon mot de passe</p>
        <a href="index.php?action=link_changepassword">Modifier</a>
    </div>
</section>

<?php $adminContent = ob_get_clean(); ?>

<?php require('admin_template.php'); ?>