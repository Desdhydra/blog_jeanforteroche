<?php

require('model/post_manager.php');
require('model/comment_manager.php');

class Comment {

    // Méthode qui permet de récupérer le contenu d'un commentaire
    public function commentContent($commentId) {
        
        // Vérification préalable de la validité de l'ID (nombre entier)
        if(preg_match('/[0-9]+/', $commentId)) {

            $commentManager = new CommentManager;
            $commentContent = $commentManager->getComment($commentId);

            if(empty($commentContent)) {
                require('view/error_notfound.php');
            } else {
                require('view/admin_editcomment.php');
            }

        } else {
            require('view/error_notfound.php');
        }

    }

    // Méthode qui permet d'afficher tous les commentaires
    public function allComments() {

        $commentManager = new CommentManager;
        $reportedComments = $commentManager->getReportedComments();
        require('view/admin_comments.php');

    }

    // Méthode qui permet d'ajouter un nouveau commentaire
    public function addComment($commentName, $commentContent, $postId) {

        // Vérification préalable de la validité de l'ID (nombre entier)
        if(preg_match('/[0-9]+/', $postId)) {

            $commentName = htmlspecialchars($commentName);
            $commentContent = htmlspecialchars($commentContent);

            $commentManager = new CommentManager;
            $commentAdded = $commentManager->createComment($commentName, $commentContent, $postId);

            if($commentAdded) {

                $postManager = new PostManager;
                $post = $postManager->getPost($postId);
                $updatedNumber = $post['comments_number'] + 1;
                $postManager->updateCommentsNumber($updatedNumber, $postId);

                header('Location: http://localhost/jeanforteroche/index.php?action=link_chapter&post_id=' . $postId . '&message_comment=ok');

            } else {
                header('Location: http://localhost/jeanforteroche/index.php?action=link_chapter&post_id=' . $postId . '&message_comment=error');
            }

        } else {
            require('view/error_notfound.php');
        }

    }

    // Méthode qui permet de publier un commentaire
    public function publishComment($commentId) {

        // Vérification préalable de la validité de l'ID (nombre entier)
        if(preg_match('/[0-9]+/', $commentId)) {

            $commentManager = new CommentManager;
            $statusChanged = $commentManager->removeReportedStatus($commentId);

            if($statusChanged) {  
                header('Location: http://localhost/jeanforteroche/index.php?action=link_admin_comments&message_commentpublished=ok');
            } else {
                header('Location: http://localhost/jeanforteroche/index.php?action=link_admin_comments&message_commentpublished=error');
            }

        } else {
            require('view/error_notfound.php');
        }

    }

    // Méthode qui permet de supprimer un commentaire
    public function deleteComment($commentId) {

        // Vérification préalable de la validité de l'ID (nombre entier)
        if(preg_match('/[0-9]+/', $commentId)) {

            $commentManager = new CommentManager;
            $comment = $commentManager->getComment($commentId);
            $postId = $comment['post_id'];
            $commentRemoved = $commentManager->removeComment($commentId);

            if($commentRemoved) {
                
                $postManager = new PostManager;
                $post = $postManager->getPost($postId);
                $updatedNumber = $post['comments_number'] - 1;
                $postManager->updateCommentsNumber($updatedNumber, $postId);

                header('Location: http://localhost/jeanforteroche/index.php?action=link_admin_comments&message_commentdeleted=ok');

            } else {
                header('Location: http://localhost/jeanforteroche/index.php?action=link_admin_comments&message_commentdeleted=error');
            }

        } else {
            require('view/error_notfound.php');
        }

    }

    // Méthode qui permet de signaler un commentaire
    public function reportComment($postId, $commentId) {

        // Vérification préalable de la validité des ID (nombres entiers)
        if(preg_match('/[0-9]+/', $postId) && preg_match('/[0-9]+/', $commentId)) {

            $commentManager = new CommentManager;
            $statusChanged = $commentManager->getReportedStatus($commentId);

            if($statusChanged) {
                header('Location: http://localhost/jeanforteroche/index.php?action=link_chapter&post_id=' . $postId . '&message_status=ok');
            } else {
                header('Location: http://localhost/jeanforteroche/index.php?action=link_chapter&post_id=' . $postId . '&message_status=error');
            }

        } else {
            require('view/error_notfound.php');
        }

    }

}