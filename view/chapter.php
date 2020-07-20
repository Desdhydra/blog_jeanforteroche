<?php $title = 'Jean Forteroche | Un billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<main>

    <h1>Billet simple pour l'Alaska</h1>

    <?php
        if(isset($detailPost)) { ?>

            <section>
                <h2><?= $detailPost['title']; ?></h2>
                <div>
                    <div>
                        <i class="far fa-calendar-alt"></i>
                        <p>Publié le <?= Post::formatDate($detailPost['creation_date']); ?></p>
                    </div>
                    <div>
                        <i class="fas fa-comment"></i>
                        <p><?= $detailPost['comments_number'] . ' commentaire(s)'; ?></p>
                    </div>
                </div>
                <div><?= $detailPost['content'] ?></div>
            </section>

            <?php 
                if($detailPost['comments_number'] != 0) { ?>

                    <section>
                        <h3>Commentaires</h3>
                        <?php foreach($allComments as $comment) { ?>
                            <article>
                                <h4>Commentaire de <?= $comment['visitor_name'] ?></h4>
                                <p>Posté le <?= Post::formatDate($comment['creation_date']); ?></p>
                                <p><?= $comment['content'] ?></p>
                            </article>
                        <?php } ?>
                    </section>

                <?php }

        require('view/comment_form.php');

        }
    ?>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>