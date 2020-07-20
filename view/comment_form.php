<section>
    <h3>Ecrire un commentaire</h3>
    <form action="index.php?action=send_comment" method="post">
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
</section>