<?php

require('model/database.php');
require('view/frontend.php');

// Gestion des actions des liens
if(isset($_GET['action'])) {
    
    if($_GET['action'] == 'link_connection') {

        require('view/connection.php');

    } elseif($_GET['action'] == 'link_home') {

        require('controller/post.php');
        $post = new Post;
        $post->lastThreePosts();

    } elseif($_GET['action'] == 'link_about') {

        require('view/about.php');

    } elseif($_GET['action'] == 'link_novel') {

        require('controller/post.php');
        $post = new Post;
        $post->allPosts();

    } elseif($_GET['action'] == 'link_chapter') {

        require('controller/post.php');
        $post = new Post;
        $post->detailPost($_GET['post_id']);

    } elseif($_GET['action'] == 'link_contact') {

        require('view/contact.php');

    } elseif($_GET['action'] == 'link_legal') {

        require('view/legal.php');
        
    } elseif($_GET['action'] == 'send_comment') {

        require('controller/comment.php');
        $comment = new Comment;
        $comment->addComment($_POST['comment-name'], $_POST['comment-content'], $_GET['post_id']);

    }

// S'il n'y a aucune action, afficher la page d'accueil
} else {

    require('controller/post.php');
    $post = new Post;
    $post->lastThreePosts();

}