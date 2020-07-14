<?php $title = 'Jean Forteroche | Accueil'; ?>

<?php ob_start(); ?>

<main>

    <section>
        <h1>Billet simple pour l'Alaska</h1>
    </section>

    <section>
        <div>
            <img src="" alt="" />
        </div>
        <div>
            <div>
                <h2>Découvrez ce nouveau projet...</h2>
                <p>Texte</p>
            </div>
            <div>
                <h2>... et interagissez !</h2>
                <p>Texte</p>
            </div>
        </div>
    </section>

    <section>
        <h2>Derniers chapitres publiés</h2>
        <div id="last-posts">
        <?php
            if(isset($lastThreePosts)) {
                foreach( $lastThreePosts as $lastPost) { ?>
                    
                    <article>
                        <h3><?= $lastPost['title']; ?></h3>
                        <p><?= preg_replace('/((\w+\W*){'.(30).'}(\w+))(.*)/', '${1}', $lastPost['content']) . '...'; ?></p>
                        <div>
                            <div class="last-post-date">
                                <i class="far fa-calendar-alt last-post-icons"></i>
                                <p><?= Post::formatDate($lastPost['creation_date']); ?></p>
                            </div>
                            <div class="last-post-comments">
                                <i class="fas fa-comment last-post-icons"></i>
                                <p><?= $lastPost['comments_number'] . ' commentaire(s)'; ?></p>
                            </div>
                        </div>
                        <button>Lire la suite</button>
                    </article>

                <?php }
            } else { ?>
                <p>En cours de publication. Revenez bientôt !</p>
            <?php }
        ?>
        </div>
    </section>


</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>