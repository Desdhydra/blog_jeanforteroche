<?php

if(isset($_GET['action'])) {

    if($_GET['action'] == 'link_home') {

        require('controller/post.php');
        $post = new Post;
        $post->lastThreePosts();

    } elseif($_GET['action'] == 'link_about') {

        require('view/about.php');

    } elseif($_GET['action'] == 'link_novel') {

        require('controller/post.php');
        $post = new Post;
        $post->listPosts();

    } elseif($_GET['action'] == 'link_contact') {

        require('view/contact.php');

    } elseif($_GET['action'] == 'link_legal') {

        require('view/legal.php');
        
    }

} else {

    require('controller/post.php');
    $post = new Post;
    $post->lastThreePosts();

}