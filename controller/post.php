<?php

require('model/post_manager.php');
require('model/comment_manager.php');

class Post {

    // Méthode qui permet d'afficher un chapitre et ses commentaires
    public function detailPost($postId) {

        $postManager = new PostManager;
        $detailPost = $postManager->getPost($postId);

        $commentManager = new CommentManager;
        $allComments = $commentManager->getAllComments($postId);

        require('view/chapter.php');

    }

    // Méthode qui permet d'afficher les trois derniers chapitres
    public function lastThreePosts() {

        $postManager = new PostManager;
        $lastThreePosts = $postManager->getLastThreePosts();

        require('view/home.php');

    }

    // Méthode qui permet d'afficher les chapitres et de gérer la pagination
    public function postsInRange($currentPage) {

        // Vérification de la validité du numéro de page (nombre entier)
        if(preg_match('/[0-9]+/', $currentPage)) {

            $postManager = new PostManager;

            // Définition du nombre de chapitres, du nombre de chapitres par page et du nombre de pages
            $numberOfPosts = $postManager->numberOfPosts();
            $postsPerPage = 2;
            $numberOfPages = ceil($numberOfPosts / $postsPerPage);

            // Vérification de la validité du numéro de page (page existante)
            if($currentPage > 0 && $currentPage <= $numberOfPages) {
                
                // Récupération des chapitres correspondants
                $postsInRange = $postManager->getPostsInRange((($currentPage-1)*$postsPerPage), $postsPerPage);
                require('view/novel.php');

            } else {

                require('view/error.php');

            }

        } else {

            require('view/error.php');

        }

    }

    // Méthode qui permet d'afficher tous les chapitres
    public function allPosts() {

        $postManager = new PostManager;
        $allPosts = $postManager->getAllPosts();

        require('view/admin_chapters.php');

    }

}