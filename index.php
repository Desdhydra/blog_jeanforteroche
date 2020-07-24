<?php

require('model/database.php');

if(isset($_GET['action'])) {
    
    // Gestion des actions des liens

    if($_GET['action'] == 'link_connection') {

        require('view/connection.php');

    } elseif($_GET['action'] == 'link_home') {

        require('controller/post.php');
        $post = new Post;
        $post->lastThreePosts();

    } elseif($_GET['action'] == 'link_about') {

        require('view/about.php');

    } elseif($_GET['action'] == 'link_novel') {

        // Détermination préalable du numéro de la page
        if(isset($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        require('controller/post.php');
        $post = new Post;
        $post->allPosts($currentPage);

    } elseif($_GET['action'] == 'link_chapter') {

        require('controller/post.php');
        $post = new Post;
        $post->detailPost($_GET['post_id']);

    } elseif($_GET['action'] == 'link_contact') {

        require('view/contact.php');

    } elseif($_GET['action'] == 'link_legal') {

        require('view/legal.php');
    
    // Gestion des actions des formulaires

    } elseif($_GET['action'] == 'send_comment') {

        require('controller/comment.php');
        $comment = new Comment;
        $comment->addComment($_POST['comment-name'], $_POST['comment-content'], $_GET['post_id']);

    } elseif($_GET['action'] == 'sign_in') {



    // Gestion des actions de signalement des commentaires

    } elseif($_GET['action'] == 'comment_reported') {

        require('controller/comment.php');
        $comment = new Comment;
        $comment->reportComment($_GET['post_id'], $_GET['comment_id']);

    }

// S'il n'y a aucune action, affiche la page d'accueil

} else {

    require('controller/post.php');
    $post = new Post;
    $post->lastThreePosts();

}