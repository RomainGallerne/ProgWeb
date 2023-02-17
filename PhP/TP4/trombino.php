<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Trombino</title>
    </head>

    <body>
        <h1>Trombino</h1><br/>
        <form method="get">
            <input type="radio" id="Statut" name="Trie" value="Statut">
                <label for="Statut">Ordre de Statut</label><br>
            <input type="radio" id="Groupe1" name="Trie" value="Groupe1">
                <label for="Groupe1">Groupe1</label><br>
            <input type="radio" id="Groupe2" name="Trie" value="Groupe2">
                <label for="Groupe2">Groupe2</label><br>
            <input type="radio" id="Option" name="Trie" value="Option">
                <label for="Option">Ordre d'Option</label><br/>
            <input type="submit" value="Trier">
        </form> 
        <?php
            ini_set('display_errors', 1); error_reporting(E_ALL); 
            
            try {
                $dbh = new PDO('mysql:host=mysql.etu.umontpellier.fr;
                dbname=e20200007056','e20200007056','5$MMthsJ9++7');

                if ($_GET['Trie'] == 'Statut'){
                    foreach(($dbh->query('SELECT statut, nom, prenom FROM etudiant ORDER BY statut')) as $row) {
                        if (!empty($row['statut'])){
                            echo '<br/>';
                            echo '<h5>Statut : '.$row['statut'].'</h5>';
                            echo '<h5>Prenom : '.$row['prenom'].' </h5>';
                            echo '<h5>Nom : '.$row['nom'].' </h5>';
                        }
                    }
                }
                if ($_GET['Trie'] == 'Option'){
                    foreach(($dbh->query('SELECT opt, nom, prenom FROM etudiant ORDER BY opt')) as $row) {
                        if (!empty($row['opt'])){
                            echo '<br/>';
                            echo '<h5>Option : '.$row['opt'].'</h5>';
                            echo '<h5>Prenom : '.$row['prenom'].' </h5>';
                            echo '<h5>Nom : '.$row['nom'].' </h5>';
                        }
                    }
                }
                if ($_GET['Trie'] == 'Groupe1'){
                    foreach(($dbh->query('SELECT groupe, nom, prenom FROM etudiant WHERE groupe=1 ORDER BY nom')) as $row) {
                        echo '<br/>';
                        echo '<h5>Groupe : '.$row['groupe'].' </h5>';
                        echo '<h5>Prenom : '.$row['prenom'].' </h5>';
                        echo '<h5>Nom : '.$row['nom'].' </h5>';
                    }
                }
                if ($_GET['Trie'] == 'Groupe2'){
                    foreach(($dbh->query('SELECT groupe, nom, prenom FROM etudiant WHERE groupe=2 ORDER BY nom')) as $row) {
                        echo '<br/>';
                        echo '<h5>Groupe : '.$row['groupe'].' </h5>';
                        echo '<h5>Prenom : '.$row['prenom'].' </h5>';
                        echo '<h5>Nom : '.$row['nom'].' </h5>';
                    }
                }
                $dbh = null;
            } catch (PDOException $e) {
                echo "Erreur : ".$e->getMessage()."<br />";
            }
        ?>
    </body>
</html>