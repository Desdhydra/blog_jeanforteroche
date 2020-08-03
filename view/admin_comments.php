<?php ob_start(); ?>

<section>

    <h1>Liste des commentaires signalés</h1>
        
    <table>

        <tr>
            <th>Auteur</th>
            <th>Contenu</th>
            <th>Date de création</th>
            <th>Actions</th>
        </tr>

        <?php if(isset($reportedComments)) {
                foreach($reportedComments as $comment) { ?>

                <tr>
                    <td><?= $comment['visitor_name']; ?></td>
                    <td><?= $comment['content']; ?></td>
                    <td><?= date('d/m/Y', strtotime($comment['creation_date'])); ?></td>
                    <td><i class="fas fa-check"></i><i class="fas fa-edit"></i><i class="fas fa-trash"></i></td>
                </tr>

                <?php }
            } ?>

    </table>

    <div>
        <h2>Légende :</h2>
        <div>
            <i class="fas fa-check"></i>
            <p>Publier</p>
        </div>
        <div>
            <i class="fas fa-edit"></i>
            <p>Editer</p>
        </div>
        <div>
            <i class="fas fa-trash"></i>
            <p>Supprimer</p>
        </div>
    </div>

</section>

<?php $adminContent = ob_get_clean(); ?>

<?php require('admin_template.php'); ?>