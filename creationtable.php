<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="form.css">
    </head>
    <body>
        <h1>Bases de données MySQL/ TABLE utilisateurs</h1>  
        <?php
            $db_username = 'root';
            $db_password = 'root';
            $db_name = 'db_authentification';
            $db_host = 'localhost';
            
            try{
                $dbco = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "CREATE TABLE utilisateurs(
                        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        prenom VARCHAR(30) NOT NULL,
                        nom VARCHAR(30) NOT NULL,
                        departement VARCHAR(30) NOT NULL,
                        coefficient INT(30) NOT NULL,
                        pays VARCHAR(30) NOT NULL,
                        mail VARCHAR(50) NOT NULL,
                        motdepasse VARCHAR(50) NOT NULL,
                        UNIQUE(Mail))";
                
                $dbco->exec($sql);
                echo 'Table utilisateurs bien créée !';
            }
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
            $dbco = null;
        ?>
    </body>
</html>