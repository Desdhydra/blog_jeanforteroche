<?php

session_start();

require('model/database.php');

if(isset($_GET['action'])) {
    
    // Gestion des actions des liens du site

    if($_GET['action'] == 'link_home') {

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
        $post->postsInRange($currentPage);

    } elseif($_GET['action'] == 'link_chapter') {

        require('controller/post.php');
        $post = new Post;
        $post->detailPost($_GET['post_id']);

    } elseif($_GET['action'] == 'link_contact') {

        require('view/contact.php');

    } elseif($_GET['action'] == 'link_legal') {

        require('view/legal.php');

    // Gestion des actions de connexion et déconnexion

    } elseif($_GET['action'] == 'link_connection') {

        require('view/connection.php');

    } elseif($_GET['action'] == 'link_logout') {

        require('view/logout.php');
    
    } elseif($_GET['action'] == 'link_forgotten_password') {

        require('view/forgottenpassword.php');

    } elseif($_GET['action'] == 'sign_in') {

        require('controller/user.php');
        $user = new User;
        $user->signIn($_POST['signin-mail'], $_POST['signin-password']);

    } elseif($_GET['action'] == 'new_password') {

        require('controller/user.php');
        $user = new User;
        $user->newPassword($_POST['newpass-mail']);

    // Gestion des actions des liens du panneau d'administration

    } elseif($_GET['action'] == 'link_profile') {

        require('view/admin_profile.php');

    } elseif($_GET['action'] == 'link_admin') {

        require('view/admin_board.php');

    } elseif($_GET['action'] == 'link_admin_chapters') {
        
        require('controller/post.php');
        $post = new Post;
        $post->allPosts();

    } elseif($_GET['action'] == 'link_admin_comments') {
    
        require('controller/comment.php');
        $comment = new Comment;
        $comment->allComments();

    } elseif($_GET['action'] == 'link_editchapter') {
        
        if(isset($_GET['post_id'])) {
            require('controller/post.php');
            $post = new Post;
            $post->postContent($_GET['post_id']);
        } else {
            require('view/admin_editchapter.php');
        }

    } elseif($_GET['action'] == 'link_editcomment') {

        require('controller/comment.php');
        $comment = new Comment;
        $comment->commentContent($_GET['comment_id']);

    // Gestion des chapitres

    } elseif($_GET['action'] == 'add_chapter') {

        require('controller/post.php');
        $post = new Post;

        if(isset($_GET['post_id'])) {
            $post->editPost($_GET['post_id'], $_POST['editchapter-title'], $_POST['editchapter-content']);
        } else {
            $post->addPost($_POST['editchapter-title'], $_POST['editchapter-content']);
        }

    } elseif($_GET['action'] == 'deletechapter') {
        
        require('controller/post.php');
        $post = new Post;
        $post->deletePost($_GET['post_id']);
    
    // Gestion des commentaires

    } elseif($_GET['action'] == 'send_comment') {

        require('controller/comment.php');
        $comment = new Comment;
        $comment->addComment($_POST['comment-name'], $_POST['comment-content'], $_GET['post_id']);

    } elseif($_GET['action'] == 'comment_reported') {

        require('controller/comment.php');
        $comment = new Comment;
        $comment->reportComment($_GET['post_id'], $_GET['comment_id']);

    } elseif($_GET['action'] == 'publish_comment') {

        require('controller/comment.php');
        $comment = new Comment;
        $comment->publishComment($_GET['comment_id']);

    } elseif($_GET['action'] == 'edit_comment') {

        require('controller/comment.php');
        $comment = new Comment;
        $comment->editComment($_POST['editcomment-content'], $_GET['comment_id']);

    } elseif($_GET['action'] == 'deletecomment') {

        require('controller/comment.php');
        $comment = new Comment;
        $comment->deleteComment($_GET['comment_id']);

    }

// S'il n'y a aucune action, affiche la page d'accueil

} else {

    require('controller/post.php');
    $post = new Post;
    $post->lastThreePosts();

}