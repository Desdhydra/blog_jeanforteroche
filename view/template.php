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

        <!-- Liens vers les ressources externes utilisées : feuilles de style, icônes Font Awesome, polices, favicon (adaptée à différents supports) et TinyMCE -->
        <link rel="stylesheet" href="public/css/style.css" />
        <link rel="stylesheet" href="public/css/style_responsive.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap"> 
        <link rel="icon" href="" />
        <link rel="apple-touch-icon" href="" />
        <link rel="apple-touch-icon" sizes="72x72" href="" />
        <link rel="apple-touch-icon" sizes="114x114" href="" />
        <link rel="apple-touch-icon" sizes="144x144" href="" />
        <script src="https://cdn.tiny.cloud/1/6200rruof6cd1pzghnq3dep45cohha6ahhliqp973mynzm3q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script> tinymce.init({
            selector: 'textarea#editchapter-content',
        }); </script>

    </head>

    <body>

        <!-- Chaque page se compose de l'en-tête, du contenu (dynamique) et du pied de page -->
        
        <?php require('header.php'); ?>

        <?= $content ?>

        <?php require('footer.php'); ?>

        <!-- Liens vers les ressources JavaScript -->
        <script src="public/js/alert.js"></script>
        <script src="public/js/menudesign.js"></script>
        <script src="public/js/main.js"></script>

    </body>

</html>