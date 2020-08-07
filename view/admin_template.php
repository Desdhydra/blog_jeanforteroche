<?php if(isset($_SESSION['status']) && ($_SESSION['status'] == 'authenticated')) { ?>

    <?php $title = 'Jean Forteroche | Panneau d\'administration'; ?>

    <?php ob_start(); ?>

    <!-- Chaque page du panneau d'administration se compose d'un sous-menu et du contenu (dynamique) -->
    <main>

        <nav>
            </ul>
                <li><a href="index.php?action=link_admin">Tableau de bord</a></li>
                <li><a href="index.php?action=link_admin_chapters">Chapitres</a></li>
                <li><a href="index.php?action=link_admin_comments">Commentaires signalés</a></li>
            </ul>
        </nav>

        <?= $adminContent ?>

    </main>

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>

<?php } else {

require('view/error_forbidden.php');

} ?>