<?php
include "Lisamastermind.php";
session_start();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mastermind</title>
</head>
<body>
  <h1>Mastermind</h1><br>
  <h2>Trouvez la bonne combinaison</h2>
  
  <form method="get">
        <label for="n">Nombre:</label><br>
        <input type='String' name='essai'><br><br>
        <input type='submit' value='Tester'>

  <?php
  if (!isset($_SESSION["mastermind"])) {
    $_SESSION["mastermind"]=new Lisamastermind(4);
    $_SESSION["secret"]=($_SESSION["mastermind"]->getSecret());
  }
  else {
      echo $_SESSION["secret"];
      echo ("<br />");
      $t=$_SESSION["mastermind"]->getTentatives();
      if ($t != []) { 
        for ($i=0;$i<($_SESSION["mastermind"]->getNbTentatives());$i++){
          echo ($_SESSION["mastermind"]->test($t[$i]));
          echo ("<br />");
        } 
      }
      if (!isset($_GET['essai'])) {echo "Rentrer une combinaison";}
      else {
        if ($_GET['essai']==$_SESSION["secret"]) {echo "Bien joué, tu as trouvé le code secret!";}
        else {
            echo ($_SESSION["mastermind"]->test($_GET['essai']))[0];
            echo (" ");
            echo ($_SESSION["mastermind"]->test($_GET['essai']))[1];
            echo (" ");
            echo ($_SESSION["mastermind"]->test($_GET['essai']))[2];
            echo ("<br />");
        }
      }
    }
  ?>
</body>
</html>