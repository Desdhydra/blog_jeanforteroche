<?php $currentActivePage = 'home' ?>

<?php $title = 'Jean Forteroche | Accueil'; ?>

<?php ob_start(); ?>

<!-- La page d'accueil se découpe en deux sections successives -->
<main>

    <!-- Première section : la présentation du blog -->
    <section id="home-book">
        <h1>Billet simple pour l'Alaska</h1>
        <div class="section-design">
            <div>
                <img src="public/images/cover-book.png" alt="Couverture du livre" />
            </div>
            <div>
                <div>
                    <h2>Découvrez ce nouveau projet ...</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div>
                    <h2>... et interagissez !</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Deuxième section : les derniers chapitres publiés -->
    <section id="home-last">
        <h2>Dernières publications</h2>
        <div>

            <?php if(isset($lastThreePosts)) {
                foreach($lastThreePosts as $lastPost) { ?>
                        
                        <article>
                            <h3><?= $lastPost['title']; ?></h3>
                            <div><?= preg_replace('/((\w+\W*){'.(30).'}(\w+))(.*)/', '${1}', $lastPost['content']) . '...'; ?></div>
                            <div class="last-post-infos">
                                <div class="last-post-date">
                                    <i class="far fa-calendar-alt last-post-icons"></i>
                                    <p><?= utf8_encode(strftime('%d %B %Y', strtotime($lastPost['creation_date']))); ?></p>
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

                <p class="section-design">En cours de publication. Revenez bientôt !</p>
                
            <?php } ?>

        </div>
    </section>


</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>