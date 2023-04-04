<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Insertion de données MySQL</h1>  
        <?php
            $db_username = 'root';
            $db_password = 'root';
            $db_name = 'db_authentification';
            $db_host = 'localhost';
            
            try{
                $dbco = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $donnees = [
                    'id' => 1, 
                    'prenom' => 'Fab',
                    'nom' => 'Youlous', 
                    'departement' => 'artcode', 
                    'coefficient' => 230,
                    'pays' => 'france',
                    'mail' => 'fabyoulous@artcode.link', 
                    'motdepasse' => '123', 
                ];

                //On utilise les requêtes préparées et des marqueurs nommés 
                $sth = $dbco->prepare(
                    "INSERT INTO utilisateurs VALUES (:id, :prenom, :nom, :departement, :coefficient, :pays, :mail, :motdepasse)"
                );
                $sth->execute($donnees);

                echo 'Entrée ajoutée dans la table';
            }

            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
            $dbco = null;
        ?>
    </body>
</html>