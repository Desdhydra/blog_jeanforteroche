<?php $currentActiveAdminPage = 'admin-profile' ?>

<?php $adminTitle = 'Profil' ?>

<?php ob_start(); ?>

<!-- La page de profil présente deux boutons qui permettent de modifier l'adresse e-mail et le mot de passe -->
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

<?php require('view/admin/template.php'); ?>