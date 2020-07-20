<?php

class CommentManager {

    // Récupération des données de tous les commentaires liés à un chapitre
    public function getAllComments($postId) {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT * from comments WHERE post_id=:post_id ORDER BY creation_date');
        $query->execute(array('post_id' => $postId));
        $comments = $query->fetchAll();
        return $comments;

    }

}