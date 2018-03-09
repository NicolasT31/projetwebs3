<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Oeuvres </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> 
  </head>

  <style>
  @import url(style.css);
  
  .oeuvre {
	font-size: 20px;
	font-family: Roboto Condensed;
  }
  
  .musicien {
	font-size: 13px;
  }
  
  .photo {
	  color: #00a3d8;
	  font-size: 12px;
  } 
  
  .albums {
	  padding: 3px 15px 3px 15px;
	  border: 1px solid #cc007a;
	  border-radius: 20px;
	  color: #cc007a;
	  font-size: 15px;
	  transition: all ease 500ms;
  }
  
  .albums:hover {
	  color: white;
	  background-color: #cc007a;
  }

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

        echo "<h1> Liste des oeuvres du musicien commençant par la lettre " . $_POST['initiale'] . "</h1>";

        include "bdd_id.php";

        $requete = $pdo->prepare("Select Musicien.Code_Musicien, Musicien.Nom_Musicien, Musicien.Prenom_Musicien, Musicien.Annee_Naissance, Musicien.Annee_Mort, Composer.Code_Oeuvre, Oeuvre.Titre_Oeuvre from Musicien
		Inner Join Composer ON Musicien.Code_Musicien = Composer.Code_Musicien 
		Inner join Oeuvre ON Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre
		Where Musicien.Nom_Musicien Like ? ");
        $requete->execute(array($_POST['initiale'] . '%'));
		

        while($donnees = $requete->fetch()) {
		echo "<span class=\"oeuvre\">" . $donnees['Titre_Oeuvre'] . "</span> <br /> <span class=\"musicien\"> Oeuvre appartenant au musicien " . $donnees['Nom_Musicien'] . ' ' . $donnees['Prenom_Musicien'];
			if($donnees['Annee_Mort'] != "") {
				echo " (" . $donnees['Annee_Naissance'] . '-' . $donnees['Annee_Mort'] . ")";
			}
			echo "</span> <br />";
            echo "<a class=\"photo\" href=\"photo2.php?Code=" . $donnees['Code_Musicien'] . "\" target=\"blank\"> Photo du musicien </a> <br /> <br />";
			echo "<a class=\"albums\" href=\"acceder_albums.php?Oeuvre=" . $donnees['Code_Oeuvre'] . "\" target=\"blank\"> ►► Afficher les albums contenant cette oeuvre </a> <br /> <br />";
     }

        $pdo = null;
      }
    ?>

  </body>
</html>
