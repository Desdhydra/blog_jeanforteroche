<?php $currentActivePage = 'novel' ?>

<?php $title = 'Jean Forteroche | Le roman'; ?>

<?php ob_start(); ?>

<!-- Cette page présente les différents chapitres du roman -->
<main>
    
    <h2>Liste des publications</h2>

    <!-- Si des articles ont déjà été publiés, on compte deux principales sections successives : les aperçus des articles et la pagination -->
    <?php if(empty($postsInRange)) { ?>
        
        <section id="section-novel-posts">
        
            <?php foreach($postsInRange as $post) { ?>

                <article>
                    <h3><?= $post['title']; ?></h3>
                    <div>
                        <div class="post-infos">
                            <div class="post-date">
                                <i class="far fa-calendar-alt"></i>
                                <p><?= utf8_encode(strftime('%d %B %Y', strtotime($post['creation_date']))); ?></p>
                            </div>
                            <div class="post-comments">
                                <i class="fas fa-comment"></i>
                                <p><?= $post['comments_number'] . ' commentaire(s)'; ?></p>
                            </div>
                        </div>
                        <div><?= preg_replace('/((\w+\W*){'.(30).'}(\w+))(.*)/', '${1}', $post['content']) . '...'; ?></div>
                    </div>
                    <div>
                        <a href="index.php?action=link_chapter&amp;post_id=<?= $post['id'] ?>">Lire la suite</a>
                    </div>
                </article>

            <?php } ?>

        </section>

        <section id="section-novel-pagination">
            
            <?php if($numberOfPages > 1) {
                for($i=1; $i<=$numberOfPages; $i++) {
                    if($i == $currentPage) {
                        echo "<span>$i</span>";
                    } else {
                        echo "<a href=\"index.php?action=link_novel&page=$i\">$i</a>";
                    }
                }
            }?>

        </section>

    <!-- Si aucun chapitre n'a été publié -->
    <?php } else { ?>
    
        <section id="section-novel-nopost" class="section-design">
            <p>En cours de publication. Revenez bientôt !</p>
        </section>

    <?php } ?>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>