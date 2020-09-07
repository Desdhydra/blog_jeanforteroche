<?php $title = 'Jean Forteroche | Mentions légales'; ?>

<?php ob_start(); ?>

<main>

    <section>
        <h2>Mentions légales</h2>
        <div class="section-design">
            <p>Paragraphe 1</p>
            <p>Paragraphe 2</p>
            <p>Paragraphe 3</p>
        </div>
    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>