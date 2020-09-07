<?php $currentActivePage = 'novel' ?>

<?php $title = 'Jean Forteroche | Un billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<!-- Cette page présente le détail d'un chapitre. Elle comporte trois principales sections successives -->
<main>

    <?php if(isset($detailPost)) { ?>

        <!-- Première section : détail du chapitre -->
        <section id="section-chapter-details" class="section-design">
            <h2>Billet simple pour l'Alaska</h2>
            <h3><?= $detailPost['title']; ?></h3>
            <div>
                <div>
                    <i class="far fa-calendar-alt"></i>
                    <p>Publié le <?= utf8_encode(strftime('%d %B %Y', strtotime($detailPost['creation_date']))); ?></p>
                </div>
                <div>
                    <i class="fas fa-comment"></i>
                    <p><?= $detailPost['comments_number'] . ' commentaire(s)'; ?></p>
                </div>
            </div>
            <div><?= $detailPost['content'] ?></div>
        </section>

        <?php if($detailPost['comments_number'] != 0) { ?>

            <!-- Deuxième section : commentaires liés au chapitre -->
            <section id="section-chapter-comments">
                <h3>Commentaires</h3>

                <?php if(isset($_GET['message_status']) && ($_GET['message_status'] == 'ok')) { ?>
                    <p class="message-success">Le commentaire a bien été signalé.</p>
                <?php } elseif(isset($_GET['message_status']) && ($_GET['message_status'] == 'error')) { ?>
                    <p class="message-error">Une erreur est survenue. Le commentaire n'a pas pu être signalé. Veuillez réessayer plus tard.</p>
                <?php }
                
                foreach($allComments as $comment) { ?>

                    <article>
                        <h4>Commentaire de <?= $comment['visitor_name'] ?></h4>
                        <p>Posté le <?= utf8_encode(strftime('%d %B %Y', strtotime($comment['creation_date']))); ?></p>
                        
                        <?php if($comment['reported_status'] == 'no') { ?>
                            
                            <p><?= $comment['content'] ?></p>
                            <div>
                                <i class="fas fa-exclamation-triangle"></i>
                                <a href="index.php?action=comment_reported&amp;post_id=<?= $detailPost['id'] ?>&amp;comment_id=<?= $comment['id'] ?>">Signaler</a>
                            </div>

                        <?php } elseif($comment['reported_status'] == 'yes') { ?>
                        
                            <p class="comment-reported">Ce commentaire a été signalé.</p>

                        <?php } ?>

                    </article>
                
                <?php } ?>        
            </section>

        <?php } ?>

        <!-- Troisième partie : formulaire de rédaction d'un nouveau commentaire -->
        <section id="section-chapter-sendcomment">
            <h3>Ecrire un commentaire</h3>
            <form method="post" action="index.php?action=send_comment&amp;post_id=<?= $detailPost['id'] ?>">
                <div>
                    <label for="comment-name">Votre nom :</label>
                    <input type="text" id="comment-name" name="comment-name" required>
                </div>
                <div>
                    <label for="comment-content">Votre message :</label>
                    <textarea id="comment-content" name="comment-content" required></textarea> 
                </div>
                <div>
                    <input type="submit" value="Envoyer">
                </div>
            </form>

            <?php if(isset($_GET['message_comment']) && ($_GET['message_comment'] == 'ok')) { ?>
                <p class="message-success">Votre commentaire a bien été ajouté.</p>
            <?php } elseif(isset($_GET['message_comment']) && ($_GET['message_comment'] == 'error')) { ?>
                <p class="message-error">Une erreur est survenue. Le commentaire n'a pas pu être envoyé. Veuillez réessayer plus tard.</p>
            <?php } ?>
        </section>

    <?php } ?>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>