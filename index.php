<?php

if(isset($_GET['action'])) {

    // Gestion des liens
    if($_GET['action'] == 'link_home') {
        require('view/home.php');
    } elseif($_GET['action'] == 'link_about') {
        require('view/about.php');
    } elseif($_GET['action'] == 'link_novel') {
        require('view/novel.php');
    } elseif($_GET['action'] == 'link_contact') {
        require('view/contact.php');
    } elseif($_GET['action'] == 'link_legal') {
        require('view/legal.php');
    }

} else {

    require('view/home.php');

}