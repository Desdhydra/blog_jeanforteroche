<?php if(isset($_SESSION['status']) && ($_SESSION['status'] == 'authenticated')) { ?>

    <?php $currentActivePage = 'admin' ?>
    
    <?php $title = 'Jean Forteroche | Panneau d\'administration'; ?>

    <?php ob_start(); ?>

    <!-- Chaque page du panneau d'administration se compose d'un sous-menu et du contenu (dynamique) -->
    <main class="main-admin">
        
        <nav id="admin-menu">
            <p>Panneau d'administration</p>
            <ul>
                <li><a href="index.php?action=link_admin_chapters" <?php if(isset($currentActiveAdminPage) && ($currentActiveAdminPage == 'admin-chapters')) { echo 'class="admin-active"'; } ?>>Chapitres</a></li>
                <li><a href="index.php?action=link_admin_comments" <?php if(isset($currentActiveAdminPage) && ($currentActiveAdminPage == 'admin-comments')) { echo 'class="admin-active"'; } ?>>Commentaires signalés</a></li>
            </ul>
        </nav>

        <div id="admin-content">
            <?= $adminContent ?>
        </div>

    </main>

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>

<?php } else {

require('view/error_forbidden.php');

} ?>