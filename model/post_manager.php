<?php

class PostManager {

    // Méthode qui permet de récupérer un chapitre
    public function getPost($postId) {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT * from posts WHERE id=:id');
        $query->execute(array('id' => $postId));
        $post = $query->fetch();
        return $post;

    }

    // Méthode qui permet de récupérer les trois derniers chapitres
    public function getLastThreePosts() {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT * from posts ORDER BY creation_date DESC LIMIT 3');
        $query->execute();
        $posts = $query->fetchAll();
        return $posts;

    }

    // Méthode qui permet de récupérer une liste de chapitres
    public function getPostsInRange($firstPost, $postsPerPage) {

        $db = Database::dbConnect();
        $sql = "SELECT * from posts ORDER BY creation_date LIMIT $firstPost, $postsPerPage";
        $query = $db->prepare($sql);
        $query->execute();
        $posts = $query->fetchAll();
        return $posts;

    }

    // Méthode qui permet de récupérer tous les chapitres
    public function getAllPosts() {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT * from posts ORDER BY creation_date');
        $query->execute();
        $posts = $query->fetchAll();
        return $posts;

    }

    // Méthode qui permet de mettre à jour du nombre de commentaires
    public function updateCommentsNumber($commentsNumber, $postId) {

        $db = Database::dbConnect();
        $query = $db->prepare('UPDATE posts SET comments_number=:comments_number WHERE id=:id');
        $query->execute(array(
            'comments_number' => $commentsNumber,
            'id' => $postId
        ));

    }

    // Méthode qui calcule le nombre de chapitres
    public function numberOfPosts() {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT COUNT(*) AS numberOfPosts FROM posts');
        $query->execute();
        $result = $query->fetch();
        $numberOfPosts = $result['numberOfPosts'];
        return $numberOfPosts;

    }

    // Méthode qui permet de créer un nouveau chapitre dans la base de données 
    public function createPost($title, $content) {

        $db = Database::dbConnect();
        $query = $db->prepare('INSERT INTO posts(title, content, creation_date, update_date, comments_number) VALUES(:title, :content, NOW(), NOW(), 0)');
        $postCreated = $query->execute(array(
            'title' => $title,
            'content' => $content
        ));
        return $postCreated;

    }

    // Méthode qui permet de mettre à jour un chapitre dans la base de données 
    public function updatePost($postId, $title, $content) {

        $db = Database::dbConnect();
        $query = $db->prepare('UPDATE posts SET title=:title, content=:content, update_date=NOW() WHERE id=:id');
        $postUpdated = $query->execute(array(
            'title' => $title,
            'content' => $content,
            'id' => $postId
        ));
        return $postUpdated;

    }

    // Méthode qui permet de supprimer chapitre dans la base de données
    public function removePost($postId) {

        $db = Database::dbConnect();
        $query = $db->prepare('DELETE FROM posts WHERE id=:id');
        $postRemoved = $query->execute(array('id' => $postId));
        return $postRemoved;

    }

}