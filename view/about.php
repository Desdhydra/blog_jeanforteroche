<?php $currentActivePage = 'about' ?>

<?php $title = 'Jean Forteroche | L\'auteur'; ?>

<?php ob_start(); ?>

<!-- La page de l'auteur présente deux sections : une pour la biographie et l'autre pour la bibliographie -->
<main>
     
    <section id="section-about">
        <h2>Biographie</h2>
        <div class="section-design">
            <figure>
                <img src="public/images/portrait-large.png" alt="">
                <figcaption>Portrait de Jean Forteroche</figcaption>
            </figure>
            <div>
                <p>Jean Forteroche est un écrivain et acteur américain. Il est né le 21 décembre à Ireki, prenant ses heureux parents au dépourvu lors de leurs vacances dans cette région enneignée. Il est élevé aux Etats-Unis, où il suit une brillante scolarité. Il se fait d'ailleurs remarquer par son professeur de français qui lui reconnaît un esprit vivace et une belle plume. Jean poursuit ensuite des études littéraires et s'inscrit dans une école de théâtre.</p>
                <p>Il obtient ses premiers rôles dans de petits théâtres locaux, avant d'attirer l'attention de metteurs en scènes renommés. Suite à cela, on lui conseille de se tourner vers le grand écran. Jean Forteroche commence alors à auditionner pour des rôles au cinéma. C'est le début de sa longue carrière d'acteur.</p>
                <p>En parallèle, Jean écrit toujours quelques histoires. Il ne se trouve aucun talent, alors il conserve ses manuscrits dans un grand carton. C'est par hasard que son épouse, Louise Lapierre, tombe sur ces récits. Elle le convainc d'en parler à un ami éditeur. Ce dernier est séduit sur le champ. Le premier roman de Jean Forteroche, &laquo; Egaré &raquo;, est un succès. Il décide alors de prendre une retraite, loin du septième art pour se consacrer à l'écriture.</p>
            </div>
        </div>
    </section>

    <section id="section-books">
        <h2>Bibliographie</h2>
        <div class="section-design">
            <div class="books-detail">
                <div>
                    <img src="public/images/book-1.png" alt="Couverture du livre Egaré " />
                    <div>
                        <i class="fas fa-search"></i>
                        <h3>Résumé</h3>
                        <p>L'humanité survit toujours profondément sous terre, à l'abri des dangers du monde dévasté qu'elle a laissé derrière elle. Dans sa cellule, au coeur du complexe souterrain qui accueille les survivants depuis plus d'un siècle, Sylvain commence à se sentir à l'étroit.</p>
                    </div>
                </div>
                <div>
                    <i class="fab fa-amazon"></i>
                    <a href="https://www.amazon.fr">Acheter</a>
                </div>
            </div>
            <div class="books-detail">
                <div>
                    <img src="public/images/book-2.png" alt="Couverture du livre La tête dans les étoiles" />
                    <div>
                        <i class="fas fa-search"></i>    
                        <h3>Résumé</h3>
                        <p>Henry a toujours voulu voyager, mais comment réaliser son rêve lorsque l'on n'a pas un sou en poche ? Les années ont passé. C'est lorsqu'il fête son soixante-sixième anniversaire qu'Henry prend la décision la plus importante de sa vie. Jusqu'où le mèneront ses aventures ?</p>
                    </div>
                </div>
                <div>
                    <i class="fab fa-amazon"></i>
                    <a href="https://www.amazon.fr">Acheter</a>
                </div>
            </div>
            <div class="books-detail">
                <div>
                    <img src="public/images/book-3.png" alt="Couverture du livre Les cimes de la pensée" />
                    <div>
                        <i class="fas fa-search"></i>
                        <h3>Résumé</h3>
                        <p>Benjamin, Raphaël et Sarah sont amis dépuis toujours. Cet été, ils ont décidé de partir à l'aventure. Leur sac de randonnée sur le dos, ils s'aventurent dans la grande forêt. Ce lieu sombre n'a pas fini de dévoiler tous ses secrets... Leur amitié sera-t-elle vraiment à toute épreuve ?</p>
                    </div>
                </div>
                <div>
                    <i class="fab fa-amazon"></i>
                    <a href="https://www.amazon.fr">Acheter</a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>