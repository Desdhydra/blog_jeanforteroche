<?php

require('model/database.php');
require('model/post_manager.php');

class Post {

    public function listPosts() {

        $postManager = new PostManager;
        $listPosts = $postManager->getPosts();

        require('view/novel.php');

    }

    public function lastThreePosts() {

        $postManager = new PostManager;
        $lastThreePosts = $postManager->getLastThreePosts();

        require('view/home.php');

    }

    public static function formatDate($date) {

        $formattedDate = date('d/m/Y', strtotime($date));
        return $formattedDate;
        
	}

}