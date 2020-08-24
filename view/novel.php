<?php $currentActivePage = 'novel' ?>

<?php $title = 'Jean Forteroche | Le roman'; ?>

<?php ob_start(); ?>

<!-- Cette page présente les différents chapitres du roman. Elle comporte deux principales sections successives -->
<main class="main">
        
    <?php if(isset($postsInRange)) { ?>
        
        <!-- Première section : aperçus des articles -->
        <section id="section-novel-posts">
            
            <?php foreach($postsInRange as $post) { ?>

                <article>
                    <h2 class="post-title"><?= $post['title']; ?></h2>
                    <div class="post-content">
                        <div>
                            <div>
                                <i class="far fa-calendar-alt"></i>
                                <p><?= date('d/m/Y', strtotime($post['creation_date'])); ?></p>
                            </div>
                            <div>
                                <i class="fas fa-comment"></i>
                                <p><?= $post['comments_number'] . ' commentaire(s)'; ?></p>
                            </div>
                        </div>
                        <p><?= preg_replace('/((\w+\W*){'.(30).'}(\w+))(.*)/', '${1}', $post['content']) . '...'; ?></p>
                        <a href="index.php?action=link_chapter&amp;post_id=<?= $post['id'] ?>">Lire la suite</a>
                    </div>
                </article>

            <?php } ?>

        </section>

        <!-- Deuxième section : pagination -->
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

    <?php } else { ?>
    
        <section id="section-novel-nopost">
            <p>En cours de publication. Revenez bientôt !</p>
        </section>

    <?php } ?>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>