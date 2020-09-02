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
        <a href="index.php?action=link_home">
            <span>Jean</span>
            <span>Forteroche</span>
        </a>
    </div>
    <nav>
        <div id="icon-burger"><i class="fas fa-bars"></i></div>
        <ul id="main-menu" class="menu-nav <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'authenticated') { echo 'menu-margin-small'; } else { echo 'menu-margin-large'; } ?>">
            <li><a href="index.php?action=link_home" <?php if(isset($currentActivePage) && ($currentActivePage == 'home')) { echo 'class="active"'; } ?>>Accueil</a></li>
            <li><a href="index.php?action=link_about" <?php if(isset($currentActivePage) && ($currentActivePage == 'about')) { echo 'class="active"'; } ?>>L'auteur</a></li>
            <li><a href="index.php?action=link_novel" <?php if(isset($currentActivePage) && ($currentActivePage == 'novel')) { echo 'class="active"'; } ?>>Le roman</a></li>
            <li><a href="index.php?action=link_contact" <?php if(isset($currentActivePage) && ($currentActivePage == 'contact')) { echo 'class="active"'; } ?>>Contact</a></li>
            <?php if(isset($_SESSION['status']) && ($_SESSION['status'] == 'authenticated')) { ?>
                <li><a href="index.php?action=link_admin_chapters" <?php if(isset($currentActivePage) && ($currentActivePage == 'admin')) { echo 'class="active"'; } ?>>Administration</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>