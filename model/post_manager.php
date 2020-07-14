<?php

class PostManager {

    public function getPosts() {

        $db = Database::dbConnect();
        $query = $db->query('SELECT * from posts ORDER BY creation_date');
        $posts = $query->fetchAll();
        return $posts;

    }

    public function getLastThreePosts() {

        $db = Database::dbConnect();
        $query = $db->query('SELECT * from posts ORDER BY creation_date DESC LIMIT 3');
        $posts = $query->fetchAll();
        return $posts;

    }

}