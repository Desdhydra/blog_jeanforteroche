<?php

require('model/post_manager.php');
require('model/comment_manager.php');

class Comment {

    // Méthode qui permet d'ajouter un nouveau commentaire
    public function addComment($commentName, $commentContent, $postId) {

        $commentName = htmlspecialchars($commentName);
        $commentContent = htmlspecialchars($commentContent);
        $postId = htmlspecialchars($postId);

        $commentManager = new CommentManager;
        $commentAdded = $commentManager->createComment($commentName, $commentContent, $postId);

        if($commentAdded) {

            $post = $postManager->getPost($postId);
            $updatedNumber = $post['comments_number'] + 1;

            $postManager = new PostManager;
            $postManager->updateCommentsNumber($updatedNumber, $postId);

        }

        header('Location: http://localhost/jeanforteroche/index.php?action=link_chapter&post_id=' . $postId . '&message_comment=ok');

    }

}