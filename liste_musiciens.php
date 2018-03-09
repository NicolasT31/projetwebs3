<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Liste Musiciens </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> 
  </head>

  <style>
    @import url(style.css);
  </style>

  <body>

    <nav>
    <ul>
      <li> <a href="./index.php"> Accueil </a> </li>
      <li> <a href="./catalogue.php"> Catalogue </a> </li>
      <li> <a href="./apropos.php"> A propos </a> </li>
      <li> <a href="./inscription.php"> Inscription </a> </li>
    </ul>
  </nav>

  <img id="header" src="https://zupimages.net/up/18/03/bspm.png" />
  
  <a id="panier" href="./panier.php"> <img src="./images/shop2.png"> </a>

    <?php
        if(isset($_POST['initiale'])) {

        echo "<h1> Liste des musiciens commençant par " . $_POST['initiale'] . "</h1>";

        include "bdd_id.php";

        $requete = $pdo->prepare("Select Code_Musicien, Nom_Musicien, Prenom_Musicien, Photo from Musicien Where Nom_Musicien Like ?");
        $requete->execute(array($_POST['initiale'] . '%'));

        while($donnees = $requete->fetch()) {
            echo $donnees['Nom_Musicien'] . ' ' . $donnees['Prenom_Musicien'] . "<br />";
            echo "<a href=\"musicien.php?Code=" . $donnees['Code_Musicien'] . "\"> Informations détaillées sur ce musicien </a> ";
            echo "<a href=\"photo2.php?Code=" . $donnees['Code_Musicien'] . "\" target=\"blank\">• Afficher sa photo </a> <br /> <br />";
     }

        $pdo = null;
      }
    ?>
  </body>
</html>
