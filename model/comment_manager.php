<?php

class CommentManager {

    // Méthode qui permet de récupérer un commentaire
    public function getComment($commentId) {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT * from comments WHERE id=:id');
        $query->execute(array('id' => $commentId));
        $comment = $query->fetch();
        return $comment;

    }

    // Méthode qui permet de récupérer les commentaires liés à un chapitre
    public function getAllComments($postId) {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT * from comments WHERE post_id=:post_id ORDER BY creation_date');
        $query->execute(array('post_id' => $postId));
        $comments = $query->fetchAll();
        return $comments;

    }

    // Méthode qui permet de récupérer les commentaires signalés
    public function getReportedComments() {

        $db = Database::dbConnect();
        $query = $db->prepare('SELECT * from comments WHERE reported_status=:reported_status ORDER BY creation_date');
        $query->execute(array('reported_status' => 'yes'));
        $comments = $query->fetchAll();
        return $comments;

    }

    // Méthode qui permet de créer un nouveau commentaire dans la base de données
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

    // Méthode qui permet de mettre à jour un commentaire dans la base de données 
    public function updateComment($content, $commentId) {

        $db = Database::dbConnect();
        $query = $db->prepare('UPDATE comments SET content=:content WHERE id=:id');
        $commentUpdated = $query->execute(array(
            'content' => $content,
            'id' => $commentId
        ));
        return $commentUpdated;

    }

    // Méthode qui permet de supprimer un commentaire
    public function removeComment($commentId) {

        $db = Database::dbConnect();
        $query = $db->prepare('DELETE FROM comments WHERE id=:id');
        $commentRemoved = $query->execute(array('id' => $commentId));
        return $commentRemoved;

    }

    // Méthode qui permet de supprimer les commentaires liés à un chapitre dans la base de données
    public function removeComments($postId) {

        $db = Database::dbConnect();
        $query = $db->prepare('DELETE FROM comments WHERE post_id=:post_id');
        $commentsRemoved = $query->execute(array('post_id' => $postId));
        return $commentsRemoved;

    }

    // Méthode qui permet de modifier le statut de signalement d'un commentaire
    public function getReportedStatus($commentId) {

        $db = Database::dbConnect();
        $query = $db->prepare('UPDATE comments SET reported_status=:reported_status WHERE id=:id');
        $statusChanged = $query->execute(array(
            'reported_status' => 'yes',
            'id' => $commentId
        ));
        return $statusChanged;

    }

    // Méthode qui permet de modifier le statut de signalement d'un commentaire
    public function removeReportedStatus($commentId) {

        $db = Database::dbConnect();
        $query = $db->prepare('UPDATE comments SET reported_status=:reported_status WHERE id=:id');
        $statusChanged = $query->execute(array(
            'reported_status' => 'no',
            'id' => $commentId
        ));
        return $statusChanged;

    }

}