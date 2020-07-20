<?php

require('model/post_manager.php');
require('model/comment_manager.php');

class Comment {

    public function addComment($commentName, $commentContent, $postId) {

        $commentName = htmlspecialchars($commentName);
        $commentContent = htmlspecialchars($commentContent);
        $postId = htmlspecialchars($postId);

        $commentManager = new CommentManager;
        $commentAdded = $commentManager->createComment($commentName, $commentContent, $postId);

        $postManager = new PostManager;

        if($commentAdded) {

            $post = $postManager->getPost($postId);
            $updatedNumber = $post['comments_number'] + 1;
            $postManager->updateCommentsNumber($updatedNumber, $postId);

            $commentMessage = 'Votre commentaire a bien été ajouté.';

        }

        $detailPost = $postManager->getPost($postId);
        $allComments = $commentManager->getAllComments($postId);
        require('view/chapter.php');

    }

}