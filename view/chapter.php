<?php $title = 'Jean Forteroche | Un billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<!-- Cette page présente le détail d'un chapitre. Elle comporte trois principales sections successives -->
<main>

    <h1>Billet simple pour l'Alaska</h1>

    <?php if(isset($detailPost)) { ?>

        <!-- Première section : détail du chapitre -->
        <section>
            <h2><?= $detailPost['title']; ?></h2>
            <div>
                <div>
                    <i class="far fa-calendar-alt"></i>
                    <p>Publié le <?= date('d/m/Y', strtotime($detailPost['creation_date'])); ?></p>
                </div>
                <div>
                    <i class="fas fa-comment"></i>
                    <p><?= $detailPost['comments_number'] . ' commentaire(s)'; ?></p>
                </div>
            </div>
            <div><?= $detailPost['content'] ?></div>
        </section>

        <?php if($detailPost['comments_number'] != 0) { ?>

            <!-- Deuxième section : commentaires liés au chapitre (s'il y en a) -->
            <section>
                <h3>Commentaires</h3>

                <?php if((isset($_GET['message_status'])) && ($_GET['message_status'] == 'ok')) { ?>
                    <p>Le commentaire a bien été signalé.</p>
                <?php } elseif((isset($_GET['message_status'])) && ($_GET['message_status'] == 'error')) { ?>
                    <p>Une erreur est survenue. Le commentaire n'a pas pu être signalé. Veuillez réessayer plus tard.</p>
                <?php }
                
                foreach($allComments as $comment) { ?>

                    <?php if($comment['reported_status'] == 'no') { ?>

                        <article>
                            <h4>Commentaire de <?= $comment['visitor_name'] ?></h4>
                            <p>Posté le <?= date('d/m/Y', strtotime($comment['creation_date'])); ?></p>
                            <p><?= $comment['content'] ?></p>
                            <div>
                                <i class="fas fa-exclamation-triangle"></i>
                                <a href="index.php?action=comment_reported&amp;post_id=<?= $detailPost['id'] ?>&amp;comment_id=<?= $comment['id'] ?>">Signaler</a>
                            </div>
                        </article>

                    <?php } elseif($comment['reported_status'] == 'yes') { ?>

                        <article>
                            <p>Ce commentaire a été signalé.</p>
                        </article>

                    <?php }
                
                } ?>

            </section>

        <?php } ?>

        <!-- Troisième partie : formulaire de rédaction d'un nouveau commentaire -->
        <section>
            <h3>Ecrire un commentaire</h3>
            <form method="post" action="index.php?action=send_comment&amp;post_id=<?= $detailPost['id'] ?>">
                <div>
                    <label for="comment-name">Votre nom :</label>
                    <input type="text" id="comment-name" name="comment-name">
                </div>
                <div>
                    <textarea name="comment-content">Votre message</textarea> 
                </div>
                <div>
                    <input type="submit" value="Envoyer">
                </div>
            </form>

            <?php if((isset($_GET['message_comment'])) && ($_GET['message_comment'] == 'ok')) { ?>
                <p>Votre commentaire a bien été ajouté.</p>
            <?php } elseif((isset($_GET['message_comment'])) && ($_GET['message_comment'] == 'error')) { ?>
                <p>Une erreur est survenue. Le commentaire n'a pas pu être envoyé. Veuillez réessayer plus tard.</p>
            <?php } ?>

        </section>

    <?php } ?>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>