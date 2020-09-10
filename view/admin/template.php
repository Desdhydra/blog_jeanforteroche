<!-- Vérification préalable que l'utilisateur est bien authentifié -->
<?php if(isset($_SESSION['status']) && ($_SESSION['status'] == 'authenticated')) { ?>

    <?php $currentActivePage = 'admin' ?>
    
    <?php $title = 'Jean Forteroche | Panneau d\'administration'; ?>

    <?php ob_start(); ?>

    <!-- Chaque page du panneau d'administration se compose d'un sous-menu et du contenu (dynamique) -->
    <main class="main-admin">
        
        <nav id="admin-menu">
            <ul>
                <li><a href="index.php?action=link_admin_chapters" <?php if(isset($currentActiveAdminPage) && ($currentActiveAdminPage == 'admin-chapters')) { echo 'class="admin-active"'; } ?>>Chapitres</a></li>
                <li><a href="index.php?action=link_admin_comments" <?php if(isset($currentActiveAdminPage) && ($currentActiveAdminPage == 'admin-comments')) { echo 'class="admin-active"'; } ?>>Commentaires signalés</a></li>
                <li><a href="index.php?action=link_profile" <?php if(isset($currentActiveAdminPage) && ($currentActiveAdminPage == 'admin-profile')) { echo 'class="admin-active"'; } ?>>Profil</a></li>
                <li><a href="index.php?action=link_logout">Se déconnecter</a></li>
            </ul>
        </nav>

        <div id="admin-content">
            <h2><?= $adminTitle ?></h2>
            <div><?= $adminContent ?></div>    
        </div>

    </main>

    <?php $content = ob_get_clean(); ?>

    <?php require('view/template.php'); ?>

<?php } else {

require('view/error_forbidden.php');

} ?>