<?php ob_start(); ?>

<section>

    <h1>Ecrire un nouveau chapitre</h1>

    <form method="post" action="index.php?action=add_chapter">
        <div>
        <div>
            <label for="editchapter-title">Titre du chapitre :</label>
            <input type="text" id="edithapter-title" name="edithapter-title">
        </div>
        <div>
            <textarea id="editchapter-content" name="editchapter-content"></textarea> 
        </div>
        <div>
            <input type="submit" value="Publier">
        </div>
    </form>

</section>

<?php $adminContent = ob_get_clean(); ?>

<?php require('admin_template.php'); ?>