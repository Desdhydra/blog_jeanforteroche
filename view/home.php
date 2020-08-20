<?php $title = 'Jean Forteroche | Accueil'; ?>

<?php ob_start(); ?>

<!-- La page d'accueil se découpe en trois sections successives -->
<main id="main-home">

    <!-- Première section : l'écran d'accueil -->
    <section id="section-title">
        <img src="public/images/header.jpg" alt="Paysage d'Alaska" />
        <h1>Billet simple pour l'Alaska</h1>
    </section>

    <!-- Deuxième section : la présentation du blog -->
    <section id="section-book">
        <div>
            <img src="public/images/cover-book.png" alt="Couverture du livre" />
        </div>
        <div>
            <div>
                <h2>Découvrez ce nouveau projet ...</h2>
                <p>Texte</p>
            </div>
            <div>
                <h2>... et interagissez !</h2>
                <p>Texte</p>
            </div>
        </div>
    </section>

    <!-- Troisième section : les derniers chapitres publiés -->
    <section id="section-last">
        <h2>Derniers chapitres publiés</h2>
        <div id="last-posts">

            <?php if(isset($lastThreePosts)) {
                foreach($lastThreePosts as $lastPost) { ?>
                        
                        <article>
                            <h3><?= $lastPost['title']; ?></h3>
                            <p><?= preg_replace('/((\w+\W*){'.(30).'}(\w+))(.*)/', '${1}', $lastPost['content']) . '...'; ?></p>
                            <div class="last-post-infos">
                                <div class="last-post-date">
                                    <i class="far fa-calendar-alt last-post-icons"></i>
                                    <p><?= date('d/m/Y', strtotime($lastPost['creation_date'])); ?></p>
                                </div>
                                <div class="last-post-comments">
                                    <i class="fas fa-comment last-post-icons"></i>
                                    <p><?= $lastPost['comments_number'] . ' commentaire(s)'; ?></p>
                                </div>
                            </div>
                            <a href="index.php?action=link_chapter&amp;post_id=<?= $lastPost['id'] ?>">Lire la suite</a>
                        </article>

                <?php }
            } else { ?>

                <p>En cours de publication. Revenez bientôt !</p>
                
            <?php } ?>

        </div>
    </section>


</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>