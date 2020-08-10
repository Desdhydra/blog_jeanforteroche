<?php ob_start(); ?>

<section>

    <h1>Edition d'un commentaire</h1>

    <p>Commentaire posté par <?= $commentContent['visitor_name'] ?> le <?= $commentContent['creation_date'] ?></p>

    <form method="post" action="index.php?action=edit_comment&amp;comment_id=<?= $commentContent['id'] ?>">
        <div>
            <textarea id="editcomment-content" name="editcomment-content" required>
                <?= $commentContent['content'] ?>
            </textarea>
        </div>
        <div>
            <input type="submit" value="Editer">
        </div>
    </form>

</section>

<?php $adminContent = ob_get_clean(); ?>

<?php require('admin_template.php'); ?>