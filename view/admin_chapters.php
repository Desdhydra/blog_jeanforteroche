<?php ob_start(); ?>

<section>

    <h1>Liste des chapitres</h1>

    <div>
        
        <a href="index.php?action=link_editchapter"><i class="fas fa-plus-circle"></i>Nouveau</a>
        
        <?php if(isset($_GET['message_editchapter'])) {
            if($_GET['message_editchapter'] == 'ok') { ?>
                <p>Votre chapitre a bien été publié.</p>
            <?php } elseif ($_GET['message_editchapter'] == 'error') { ?>
                <p>Une erreur est survenue. Le chapitre n'a pas pu être publié. Veuillez réessayer plus tard.</p>
            <?php }
        } ?>

        <?php if(isset($_GET['message_deletechapter'])) {
            if($_GET['message_deletechapter'] == 'ok') { ?>
                <p>Votre chapitre a bien été supprimé.</p>
            <?php } elseif ($_GET['message_deletechapter'] == 'error') { ?>
                <p>Une erreur est survenue. Le chapitre n'a pas pu être supprimé. Veuillez réessayer plus tard.</p>
            <?php }
        } ?>


        <table>

            <tr>
                <th>Titre</th>
                <th>Date de création</th>
                <th>Date de modification</th>
                <th>Actions</th>
            </tr>

            <?php if(isset($allPosts)) {
                foreach($allPosts as $post) { ?>

                <tr id="<?php echo $post['id']; ?>">
                    <td><?= $post['title']; ?></td>
                    <td><?= date('d/m/Y', strtotime($post['creation_date'])); ?></td>
                    <td><?php if($post['update_date'] == $post['creation_date']) {
                        echo ' / ';
                    } else {
                        date('d/m/Y', strtotime($post['update_date']));
                    } ?></td>
                    <td>
                        <a href=""><i class="fas fa-edit"></i></a>
                        <i class="alert-popup fas fa-trash"></i>
                    </td>
                </tr>

                <?php }
            } ?>

        </table>
        
        <div>
            <h2>Légende :</h2>
            <div>
                <i class="fas fa-edit"></i>
                <p>Editer</p>
            </div>
            <div>
                <i class="fas fa-trash"></i>
                <p>Supprimer</p>
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
                    <a id="alert-url" href="index.php?action=link_deletechapter&amp;post_id=<?= $post['id'] ?>">Confirmer</a>
                </div>
            </div>
        </div>

    </div>

</section>

<!-- Liens vers les ressources JavaScript -->
<script src="public/js/alert.js"></script>

<?php $adminContent = ob_get_clean(); ?>

<?php require('admin_template.php'); ?>