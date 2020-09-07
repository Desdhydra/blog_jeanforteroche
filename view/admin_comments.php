<?php $currentActiveAdminPage = 'admin-comments' ?>

<?php $adminTitle = 'Liste des commentaires signalés' ?>

<?php ob_start(); ?>

<!-- Tableau qui liste tous les commentaire signalés et sa légende -->
<section class="section-design">

    <table>

        <tr>
            <th>Auteur</th>
            <th>Contenu</th>
            <th>Date de création</th>
            <th>Actions</th>
        </tr>

        <?php if(isset($reportedComments)) {
            foreach($reportedComments as $comment) { ?>

                <tr id="<?php echo $comment['id']; ?>" class="type-comment">
                    <td><?= $comment['visitor_name']; ?></td>
                    <td><?= $comment['content']; ?></td>
                    <td><?= date('d/m/Y', strtotime($comment['creation_date'])); ?></td>
                    <td>
                        <a href="index.php?action=publish_comment&amp;comment_id=<?= $comment['id'] ?>"><i class="fas fa-check"></i></a>
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
                <i class="fas fa-check"></i>
                <p>Publier</p>
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
                <p>Souhaitez-vous supprimer définitivement ce commentaire ?</p>
            </div>
            <div>
                <button id="alert-cancel">Annuler</button>
                <a id="alert-url" href="">Confirmer</a>
            </div>
        </div>
    </div>

</section>

<!-- Gestion des messages de confirmation et d'erreur -->
<section class="section-admin-messages">
    <?php if(isset($_GET['message_commentpublished'])) {
        if($_GET['message_commentpublished'] == 'ok') { ?>
            <p class="message-success">Ce commentaire a bien été publié.</p>
        <?php } elseif ($_GET['message_commentpublished'] == 'error') { ?>
            <p class="message-error">Une erreur est survenue. Ce commentaire n'a pas pu être publié. Veuillez réessayer plus tard.</p>
        <?php }
    } ?>

    <?php if(isset($_GET['message_commentdeleted'])) {
        if($_GET['message_commentdeleted'] == 'ok') { ?>
            <p class="message-success">Ce commentaire a bien été supprimé.</p>
        <?php } elseif ($_GET['message_commentdeleted'] == 'error') { ?>
            <p class="message-error">Une erreur est survenue. Ce commentaire n'a pas pu être supprimé. Veuillez réessayer plus tard.</p>
        <?php }
    } ?>
</section>

<?php $adminContent = ob_get_clean(); ?>

<?php require('admin_template.php'); ?>