<!-- L'en-tête se compose du lien de connexion, du logo et du menu de navigation -->
<header>

    <div id="header-connection">
        <ul>
            <?php if(isset($_SESSION['status']) && ($_SESSION['status'] == 'authenticated')) { ?>
                <li>Jean Forteroche</li>
                <li><a href="index.php?action=link_profile">Profil</a></li>
                <li><a href="index.php?action=link_logout">Se déconnecter</a></li>
            <?php } else { ?>
                <li><a href="index.php?action=link_connection">Se connecter</a></li>
            <?php } ?>
        </ul>
    </div>

    <div id="header-title">
        <p>Jean</p>
        <p>Forteroche</p>
    </div>

    <nav>
        <ul>
            <li><a href="index.php?action=link_home">Accueil</a></li>
            <li><a href="index.php?action=link_about">L'auteur</a></li>
            <li><a href="index.php?action=link_novel">Le roman</a></li>
            <li><a href="index.php?action=link_contact">Contact</a></li>
            <?php if(isset($_SESSION['status']) && ($_SESSION['status'] == 'authenticated')) { ?>
                <li><a href="index.php?action=link_admin_chapters">Administration</a></li>
            <?php } ?>
            <li id="burger-icon"><i class="fas fa-bars"></i></li>
        </ul>
    </nav>

</header>