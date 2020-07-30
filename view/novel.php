<?php $title = 'Jean Forteroche | Le roman'; ?>

<?php ob_start(); ?>

<!-- Cette page présente les différents chapitres du roman. Elle comporte deux principales sections successives -->
<main>

    <h1>Billet simple pour l'Alaska</h1>

    <!-- Première section : aperçus des articles -->
    <section>
        
        <?php if(isset($postsInRange)) {
            foreach($postsInRange as $post) { ?>

                <article>
                    <h2><?= $post['title']; ?></h2>
                    <p><?= preg_replace('/((\w+\W*){'.(30).'}(\w+))(.*)/', '${1}', $post['content']) . '...'; ?></p>
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
                    <a href="index.php?action=link_chapter&amp;post_id=<?= $post['id'] ?>">Lire la suite</a>
                </article>

            <?php }
        } else { ?>

            <p>En cours de publication. Revenez bientôt !</p>

        <?php } ?>
    
    </section>

    <!-- Deuxième section : pagination -->
    <section>
        
        <?php if($numberOfPages > 1) {

            for($i=1; $i<=$numberOfPages;$i++) {
                
                if($i == $currentPage) {
                    echo "$i /";
                } else {
                    echo "<a href=\"index.php?action=link_novel&page=$i\">$i</a> /";
                }
            
            }

        }?>

    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>