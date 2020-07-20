<?php

class PostManager {

    // Récupération des données d'un chapitre
    public function getPost($postId) {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT * from posts WHERE id=:id');
        $query->execute(array('id' => $postId));
        $post = $query->fetch();
        return $post;

    }

    // Récupération des données de tous les chapitres
    public function getAllPosts() {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT * from posts ORDER BY creation_date');
        $query->execute();
        $posts = $query->fetchAll();
        return $posts;

    }

    // Récupération des données des trois derniers chapitres
    public function getLastThreePosts() {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT * from posts ORDER BY creation_date DESC LIMIT 3');
        $query->execute();
        $posts = $query->fetchAll();
        return $posts;

    }

}