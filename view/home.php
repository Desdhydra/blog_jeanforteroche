<?php $currentActivePage = 'home' ?>

<?php $title = 'Jean Forteroche | Accueil'; ?>

<?php ob_start(); ?>

<!-- La page d'accueil se découpe en deux sections successives : la présentation du blog et les dernières publications -->
<main>

    <section id="home-book">
        <h1>Billet simple pour l'Alaska</h1>
        <div class="section-design">
            <div>
                <img src="public/images/cover-book.png" alt="Couverture du livre" />
            </div>
            <div>
                <div>
                    <h2>Découvrez ce nouveau projet ...</h2>
                    <p>Après le succès de ses trois premiers romans, &laquo; Egaré &raquo;, &laquo; La tête dans les étoiles &raquo; et &laquo; Les cimes de la pensée &raquo;, Jean Forteroche souhaite remercier ses lecteurs et leur proposer une nouvelle expérience. C'est une idée qui trottait depuis longtemps dans sa tête, alors... C'est décidé : &laquo; Billet simple pour l'Alaska &raquo;, son nouveau roman, sera publié directement en ligne.</p>
                </div>
                <div>
                    <h2>... et interagissez !</h2>
                    <p>Ce n'est pas tout. Ce blog n'accueillera pas seulement, chapitre par chapitre, ce nouveau récit à suspens. Jean Forteroche apprécie la proximité qu'il entretient avec ses lecteurs. Curieux de connaître leurs réactions, il souhaite leur donner l'opportunité de commenter directement ses écrits. Alors, n'hésitez pas à lui laisser un petit message.</p>
                </div>
            </div>
        </div>
    </section>

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