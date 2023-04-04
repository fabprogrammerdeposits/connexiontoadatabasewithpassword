<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
        <div id="content">
            <a href='index.php?deconnexion=true'><span>Déconnexion</span></a>
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if(isset($_GET['deconnexion']))
                { 
                    if($_GET['deconnexion']==true)
                    { 
                        session_unset();
                        header("location:login.php");
                    }
                }
                else if($_SESSION['prenom'] !== ""){
                    $user = $_SESSION['prenom'];
                    // afficher un message
                    echo "<br>Bonjour $user, vous êtes connecté";
                }
            ?>
        </div>
    </body>
</html>