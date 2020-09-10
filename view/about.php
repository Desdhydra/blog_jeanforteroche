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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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