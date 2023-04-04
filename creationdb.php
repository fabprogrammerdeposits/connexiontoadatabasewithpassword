<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="form.css">
    </head>
    <body>
        <h1>Création d'une base de données MySQL en PDO</h1>  
        <?php
            $db_username = 'root';
            $db_password = 'root';
            $db_host = 'localhost';
            
            try{
                $dbco = new PDO("mysql:host=$db_host", $db_username, $db_password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "CREATE DATABASE db_authentification";
                $dbco->exec($sql);
                
                echo 'Base de données db_authentification bien créée !';
            }
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
            $dbco = null;
        ?>
    </body>
</html>