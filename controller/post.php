<?php

require('model/post_manager.php');
require('model/comment_manager.php');

class Post {

    // Méthode qui permet de récupérer le contenu d'un chapitre
    public function postContent($postId) {

        // Vérification préalable de la validité de l'ID (nombre entier)
        if(preg_match('/[0-9]+/', $postId)) {

            $postManager = new PostManager;
            $postContent = $postManager->getPost($postId);

            if(empty($postContent)) {
                require('view/error_notfound.php');
            } else {
                require('view/admin_editchapter.php');
            }

        } else {
            require('view/error_notfound.php');
        }

    }

    // Méthode qui permet d'afficher un chapitre et ses commentaires
    public function detailPost($postId) {

        // Vérification préalable de la validité de l'ID (nombre entier)
        if(preg_match('/[0-9]+/', $postId)) {

            $postManager = new PostManager;
            $detailPost = $postManager->getPost($postId);

            if(empty($detailPost)) {
                require('view/error_notfound.php');
            } else {
                $commentManager = new CommentManager;
                $allComments = $commentManager->getAllComments($postId);
                require('view/chapter.php');
            }

        } else {
            require('view/error_notfound.php');
        }

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
            $postsPerPage = 4;
            $numberOfPages = ceil($numberOfPosts / $postsPerPage);

            // Vérification de la validité du numéro de page (page existante)
            if($currentPage > 0 && $currentPage <= $numberOfPages) {
                
                // Récupération des chapitres correspondants
                $postsInRange = $postManager->getPostsInRange((($currentPage-1)*$postsPerPage), $postsPerPage);
                require('view/novel.php');

            } else {
                require('view/error_notfound.php');
            }

        } else {
            require('view/error_notfound.php');
        }

    }

    // Méthode qui permet d'afficher tous les chapitres
    public function allPosts() {

        $postManager = new PostManager;
        $allPosts = $postManager->getAllPosts();
        require('view/admin_chapters.php');

    }

    // Méthode qui permet d'ajouter un nouveau chapitre
    public function addPost($title, $content) {

        $title = htmlspecialchars($title);

        $postManager = new PostManager;
        $postAdded = $postManager->createPost($title, $content);

        if($postAdded) {
            header('Location: http://localhost/jeanforteroche/index.php?action=link_admin_chapters&message_editchapter=ok');
        } else {
            header('Location: http://localhost/jeanforteroche/index.php?action=link_admin_chapters&message_editchapter=error');
        }

    }

    // Méthode qui permet d'éditer et de mettre à jour un chapitre
    public function editPost($postId, $title, $content) {

        // Vérification préalable de la validité de l'ID (nombre entier)
        if(preg_match('/[0-9]+/', $postId)) {

            $title = htmlspecialchars($title);

            $postManager = new PostManager;
            $postUpdated = $postManager->updatePost($postId, $title, $content);

            if($postUpdated) {
                header('Location: http://localhost/jeanforteroche/index.php?action=link_admin_chapters&message_updatechapter=ok');
            } else {
                header('Location: http://localhost/jeanforteroche/index.php?action=link_admin_chapters&message_updatechapter=error');
            }

        } else {
            require('view/error_notfound.php');
        }

    }

    // Méthode qui permet de supprimer un chapitre
    public function deletePost($postId) {

        // Vérification préalable de la validité de l'ID (nombre entier)
        if(preg_match('/[0-9]+/', $postId)) {

            $postManager = new PostManager;
            $postDeleted = $postManager->removePost($postId);

            $commentManager = new CommentManager;
            $commentsDeleted = $commentManager->removeComments($postId);

            if($postDeleted && $commentsDeleted) {
                header('Location: http://localhost/jeanforteroche/index.php?action=link_admin_chapters&message_deletechapter=ok');
            } else {
                header('Location: http://localhost/jeanforteroche/index.php?action=link_admin_chapters&message_deletechapter=error');
            }

        } else {
            require('view/error_notfound.php');
        }

    }

}