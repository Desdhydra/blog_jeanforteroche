<?php $currentActiveAdminPage = 'admin-chapters' ?>

<?php ob_start(); ?>

<h2>Liste des chapitres</h2>

<!-- Gestion des messages de confirmation et d'erreur -->
<section id="section-adminchapters-messages">

    <?php if(isset($_GET['message_editchapter'])) {
        if($_GET['message_editchapter'] == 'ok') { ?>
            <p class="message-success">Votre chapitre a bien été publié.</p>
        <?php } elseif ($_GET['message_editchapter'] == 'error') { ?>
            <p class="message-error">Une erreur est survenue. Le chapitre n'a pas pu être publié. Veuillez réessayer plus tard.</p>
        <?php }
    } ?>

    <?php if(isset($_GET['message_updatechapter'])) {
        if($_GET['message_updatechapter'] == 'ok') { ?>
            <p class="message-success">Votre chapitre a bien été publié.</p>
        <?php } elseif ($_GET['message_updatechapter'] == 'error') { ?>
            <p class="message-error">Une erreur est survenue. Le chapitre n'a pas pu être publié. Veuillez réessayer plus tard.</p>
        <?php }
    } ?>

    <?php if(isset($_GET['message_deletechapter'])) {
        if($_GET['message_deletechapter'] == 'ok') { ?>
            <p class="message-success">Votre chapitre a bien été supprimé.</p>
        <?php } elseif ($_GET['message_deletechapter'] == 'error') { ?>
            <p class="message-error">Une erreur est survenue. Le chapitre n'a pas pu être supprimé. Veuillez réessayer plus tard.</p>
        <?php }
    } ?>

</section>

<!-- Tableau qui liste tous les chapitres publiés et sa légende -->
<section id="section-adminchapters-content">

    <!-- Bouton qui permet de créer un nouveau chapitre -->
    <a href="index.php?action=link_editchapter"><i class="fas fa-plus-circle"></i>Nouveau</a>

    <table>

        <tr>
            <th>Titre</th>
            <th>Date de création</th>
            <th>Date de modification</th>
            <th>Actions</th>
        </tr>

        <?php if(isset($allPosts)) {
            foreach($allPosts as $post) { ?>

            <tr id="<?php echo $post['id']; ?>" class="type-post">
                <td><?= $post['title']; ?></td>
                <td><?= date('d/m/Y', strtotime($post['creation_date'])); ?></td>
                <td><?php if($post['update_date'] == $post['creation_date']) {
                        echo ' / ';
                    } else {
                        echo date('d/m/Y', strtotime($post['update_date']));
                    } ?>
                </td>
                <td>
                    <a href="index.php?action=link_editchapter&amp;post_id=<?= $post['id'] ?>"><i class="fas fa-edit"></i></a>
                    <i class="alert-popup fas fa-trash"></i>
                </td>
            </tr>

            <?php }
        } ?>

    </table>

    <div id="table-caption">
        <h3>Légende :</h3>
        <div>
            <div>
                <i class="fas fa-edit"></i>
                <p>Editer</p>
            </div>
            <div>
                <i class="fas fa-trash"></i>
                <p>Supprimer</p>
            </div>
        </div>
    </div>

    <!-- Pop up d'alerte de suppression -->
    <div id="alert-deletion">
        <div>
            <div>
                <p>Souhaitez-vous supprimer définitivement ce chapitre ?</p>
            </div>
            <div>
                <button id="alert-cancel">Annuler</button>
                <a id="alert-url" href="">Confirmer</a>
            </div>
        </div>
    </div>

</section>

<?php $adminContent = ob_get_clean(); ?>

<?php require('admin_template.php'); ?>