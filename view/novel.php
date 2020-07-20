<?php $title = 'Jean Forteroche | Le roman'; ?>

<?php ob_start(); ?>

<main>

    <h1>Billet simple pour l'Alaska</h1>

    <section>
        
        <?php
            if(isset($allPosts)) {
                foreach($allPosts as $post) { ?>

                    <article>
                        <h2><?= $post['title']; ?></h2>
                        <p><?= preg_replace('/((\w+\W*){'.(30).'}(\w+))(.*)/', '${1}', $post['content']) . '...'; ?></p>
                        <div>
                            <div>
                                <i class="far fa-calendar-alt"></i>
                                <p><?= Frontend::formatDate($post['creation_date']); ?></p>
                            </div>
                            <div>
                                <i class="fas fa-comment"></i>
                                <p><?= $post['comments_number'] . ' commentaire(s)'; ?></p>
                            </div>
                        </div>
                        <a href="index.php?action=link_chapter&amp;post_id=<?= $post['id'] ?>">Lire la suite</a>
                    </article>

                <?php }
            } else { ?>
                <p>En cours de publication. Revenez bientôt !</p>
            <?php }
        ?>
    
    </section>

    <section>
        <p>Pagination</p>
    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>