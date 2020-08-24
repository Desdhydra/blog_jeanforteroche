<?php $title = 'Jean Forteroche | Mentions légales'; ?>

<?php ob_start(); ?>

<main class="main">

    <section>
        <h2>Mentions légales</h2>
        <p>Paragraphe 1</p>
        <p>Paragraphe 2</p>
        <p>Paragraphe 3</p>
    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>