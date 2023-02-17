<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Stage A</title>
    </head>

    

    <body>
        <h1>Stage A</h1><br />
        <?php
            ini_set('display_errors', 1); error_reporting(E_ALL); 

            try {
                $dbh = new PDO('mysql:host=mysql.etu.umontpellier.fr;
                dbname=e20200007056','e20200007056','5$MMthsJ9++7');
                
                $numeroStage = 0;
                foreach(($dbh->query('SELECT nom, prenom, etudiant.numStageA, sujet, respEnt, respPeda FROM etudiant, stagea WHERE etudiant.numStageA=stagea.numStageA ORDER BY etudiant.numStageA')) as $row) {
                    if ($numeroStage != $row['numStageA']){
                        echo '<br/>';
                        echo '<h5>Stage n°'.$row['numStageA'].' </h5>';
                        echo $row['sujet'];
                        echo '<h6>Responsable de Stage : "'.$row['respEnt'].'" </h6>';
                        echo '<h6>Responsable Pedagogique : "'.$row['respPeda'].'" </h6>';
                        echo '<h6>Noms des étudiants : </h6>';
                        while ($numeroStage != $row['numStageA']){
                            $numeroStage++;
                        }
                    }
                    echo $row['nom'].' '.$row['prenom'].'<br/>';
                }
                $dbh = null;
            } catch (PDOException $e) {
                echo "Erreur : ".$e->getMessage()."<br />";
            }
        ?>
    </body>
</html>