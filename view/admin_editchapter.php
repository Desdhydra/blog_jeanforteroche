<?php ob_start(); ?>

<section>

    <h1>Ecrire un nouveau chapitre</h1>

    <form method="post" action="index.php?action=add_chapter<?php if(isset($postContent)){ echo '&post_id=' . $postContent['id']; }?>">
        <div>
        <div>
            <label for="editchapter-title">Titre du chapitre :</label>
            <input type="text" id="editchapter-title" name="editchapter-title" <?php if(isset($postContent)){ echo 'value="' . $postContent['title'] . '"'; }?> >
        </div>
        <div>
            <textarea id="editchapter-content" name="editchapter-content">
                <?php if(isset($postContent)){ echo $postContent['content']; } ?>
            </textarea> 
        </div>
        <div>
            <input type="submit" value="Publier">
        </div>
    </form>

</section>

<?php $adminContent = ob_get_clean(); ?>

<?php require('admin_template.php'); ?>