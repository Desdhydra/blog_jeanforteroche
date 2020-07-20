<section>
    <h3>Ecrire un commentaire</h3>
    <form method="post" action="index.php?action=send_comment&amp;post_id=<?= $detailPost['id'] ?>">
        <div>
            <label for="comment-name">Votre nom :</label>
            <input type="text" id="comment-name" name="comment-name">
        </div>
        <div>
            <textarea name="comment-content">Votre message</textarea> 
        </div>
        <div>
            <input type="submit" value="Envoyer">
        </div>
    </form>
    
    <?php
        if(isset($commentMessage)) {
            echo '<p>' . $commentMessage . '</p>';
        }
    ?>

</section>