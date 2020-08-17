<?php ob_start(); ?>

<h1>Edition d'un chapitre</h1>

<section>

    <form method="post" action="index.php?action=add_chapter<?php if(isset($postContent)){ echo '&post_id=' . $postContent['id']; }?>">
        <div>
            <label for="editchapter-title">Titre du chapitre :</label>
            <input type="text" id="editchapter-title" name="editchapter-title" <?php if(isset($postContent)){ echo 'value="' . $postContent['title'] . '"'; }?>  required>
        </div>
        <div>
            <textarea id="editchapter-content" name="editchapter-content" required>
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