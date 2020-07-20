<?php

require('model/post_manager.php');
require('model/comment_manager.php');

class Post {

    // Affichage d'un chapitre et de ses commentaires
    public function detailPost($postId) {

        $postManager = new PostManager;
        $detailPost = $postManager->getPost($postId);

        $commentManager = new CommentManager;
        $allComments = $commentManager->getAllComments($postId);

        require('view/chapter.php');

    }

    // Affichage de tous les chapitres
    public function allPosts() {

        $postManager = new PostManager;
        $allPosts = $postManager->getAllPosts();

        require('view/novel.php');

    }

    // Affichage des trois derniers chapitres
    public function lastThreePosts() {

        $postManager = new PostManager;
        $lastThreePosts = $postManager->getLastThreePosts();

        require('view/home.php');

    }

}