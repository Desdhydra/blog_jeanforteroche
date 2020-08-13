<!-- Le pied de page se compose d'un portrait, d'un rappel du menu de navigation, de liens vers les réseaux sociaux et du copyright -->
<footer>

    <div id="footer-content">
        <div id="footer-image">
            <img src="public/images/portrait.png" alt="Portrait de Jean Forteroche" />
        </div>
        <div id="footer-infos">
            <div id="footer-navigation">
                <ul>
                    <li><a href="index.php?action=link_home">Accueil</a></li>
                    <li><a href="index.php?action=link_about">L'auteur</a></li>
                    <li><a href="index.php?action=link_novel">La roman</a></li>
                    <li><a href="index.php?action=link_contact">Contact</a></li>
                    <?php if(isset($_SESSION['status']) && ($_SESSION['status'] == 'authenticated')) { ?>
                        <li><a href="index.php?action=link_admin_chapters">Administration</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div id="footer-social">
                <ul>
                    <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="https://twitter.com/"><i class="fab fa-twitter-square"></i></a></li>
                    <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="footer-copyright">
        <p>2020 © Jean Forteroche | <a href="index.php?action=link_legal">Mentions légales</a></p>
    <div>

</footer>