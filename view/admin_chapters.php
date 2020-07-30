<?php ob_start(); ?>

<section>

    <h1>Liste des chapitres</h1>

    <div>
        
        <a href=""><i class="fas fa-plus-circle"></i> Nouveau</a>
        
        <table>

            <tr>
                <th>Titre</th>
                <th>Date de création</th>
                <th>Date de modification</th>
                <th>Actions</th>
            </tr>

            <?php if(isset($allPosts)) {
                foreach($allPosts as $post) { ?>

                <tr>
                    <td><?= $post['title']; ?></td>
                    <td><?= date('d/m/Y', strtotime($post['creation_date'])); ?></td>
                    <td><?php if($post['update_date'] == $post['creation_date']) {
                        echo ' / ';
                    } else {
                        date('d/m/Y', strtotime($post['update_date']));
                    } ?></td>
                    <td><i class="fas fa-edit"></i><i class="fas fa-trash"></i></td>
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

    </div>

</section>

<?php $adminContent = ob_get_clean(); ?>

<?php require('admin_template.php'); ?>