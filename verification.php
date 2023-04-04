<?php
    session_start();
    if(isset($_POST['mail']) && isset($_POST['motdepasse']))
    {
        // connexion à la base de données
        $db_username = 'root';
        $db_password = 'root';
        $db_name = 'db_authentification';
        $db_host = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
        or die('could not connect to database');

        // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
        // pour éliminer toute attaque de type injection SQL et XSS
        $mail = mysqli_real_escape_string($db,htmlspecialchars($_POST['mail'])); 
        $motdepasse = mysqli_real_escape_string($db,htmlspecialchars($_POST['motdepasse']));

            if($mail !== "" && $motdepasse !== "")
            {
                $requete = "SELECT count(*) FROM utilisateurs where 
                mail = '".$mail."' and motdepasse = '".$motdepasse."' ";
                $exec_requete = mysqli_query($db,$requete);
                $reponse = mysqli_fetch_array($exec_requete);
                $count = $reponse['count(*)'];
                if($count!=0) // email et mot de passe corrects
                {
                    $requete = "SELECT prenom FROM utilisateurs where 
                    mail = '".$mail."' and motdepasse = '".$motdepasse."' ";
                    $exec_requete = mysqli_query($db,$requete);
                    $reponse = mysqli_fetch_array($exec_requete);
                    $data_prenom = $reponse['prenom'];
                    //$data_prenom = mysqli_fetch_array($req);
                    $_SESSION['prenom'] = $data_prenom;
                    header('Location: index.php');
                }
                else
                {
                    header('Location: login.php?erreur=1'); // email ou mot de passe incorrect
                }
            }
            else
            {
                header('Location: login.php?erreur=2'); // email ou mot de passe vide
            }
    }
    else
    {
        header('Location: login.php');
    }
    mysqli_close($db); // fermer la connexion
?>