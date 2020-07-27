<!DOCTYPE html>

<html lang="fr">

    <head>

        <!-- Balises de métadonnées et définition du titre de la page (dynamique) -->
        <meta charset="utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Audrey Joachim" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?= $title ?></title>

        <!-- Liens vers les ressources externes utilisées : feuilles de style, icônes Font Awesome, polices et favicon (adaptée à différents supports) -->
        <link rel="stylesheet" href="public/css/style.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
        <link rel="icon" href="" />
        <link rel="apple-touch-icon" href="" />
        <link rel="apple-touch-icon" sizes="72x72" href="" />
        <link rel="apple-touch-icon" sizes="114x114" href="" />
        <link rel="apple-touch-icon" sizes="144x144" href="" />

    </head>

    <body>

        <!--  -->
        
        <header>
            <nav>
                <div>Jean Forteroche</div>
                <ul>
                    <li>Se déconnecter</li>
                    <li>Retour au site</li>
                </ul>
            </nav>
        <header>

        <div>

            <nav>
                <h2>Menu</h2>
                <ul>
                    <li>Tableau de bord</li>
                    <li>Chapitres</li>
                    <li>Commentaires</li>
                </ul>
            </nav>

            <main><?= $content ?></main>

        </div>

    </body>

</html>