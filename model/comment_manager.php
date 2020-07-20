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

    public function createComment($commentName, $commentContent, $postId) {

        $db = Database::dbConnect();
        $query = $db->prepare('INSERT INTO comments(visitor_name, content, creation_date, post_id, reported_status) VALUES(:visitor_name, :content, NOW(), :post_id, :reported_status)');
        $commentCreated = $query->execute(array(
            'visitor_name' => $commentName,
            'content' => $commentContent,
            'post_id' => $postId,
            'reported_status' => 'no'
        ));
        return $commentCreated;

    }

}