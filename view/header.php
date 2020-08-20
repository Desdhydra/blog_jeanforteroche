<!-- L'en-tête se compose du lien de connexion, du logo et du menu de navigation -->
<header>

    <div id="header-connection" class="dropdown">
        <?php if(isset($_SESSION['status']) && ($_SESSION['status'] == 'authenticated')) { ?>
            <button class="dropdown-button">Jean Forteroche<i class="fas fa-caret-down"></i></button>
            <ul class="dropdown-content">
                <li><a href="index.php?action=link_profile">Profil</a></li>
                <li><a href="index.php?action=link_logout">Se déconnecter</a></li>
            </ul>
        <?php } else { ?>
            <a href="index.php?action=link_connection">Se connecter</a>
        <?php } ?>
    </div>

    <div id="header-title">
        <p>Jean</p>
        <p>Forteroche</p>
    </div>

    <nav>
        <div id="icon-burger"><i class="fas fa-bars"></i></div>
        <ul id="main-menu" class="menu-nav">
            <li><a href="index.php?action=link_home">Accueil</a></li>
            <li><a href="index.php?action=link_about">L'auteur</a></li>
            <li><a href="index.php?action=link_novel">Le roman</a></li>
            <li><a href="index.php?action=link_contact">Contact</a></li>
            <?php if(isset($_SESSION['status']) && ($_SESSION['status'] == 'authenticated')) { ?>
                <li><a href="index.php?action=link_admin_chapters">Administration</a></li>
            <?php } ?>
        </ul>
    </nav>

</header>