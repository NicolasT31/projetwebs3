<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Albums </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
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

        if(isset($_GET['Oeuvre'])) {
			
		$codeOeuvre = htmlspecialchars($_GET['Oeuvre']);
		
        echo "<h1> Liste des albums contenant l'oeuvre choisie : </h1>";

        include "bdd_id.php";
		
        $requete = $pdo->prepare("Select Album.Code_Album, Album.Titre_Album, Album.Annee_Album, Genre.Libelle_Abrege from Album
    Inner join Genre ON Album.Code_Genre = Genre.Code_Genre
		Inner Join Disque ON Album.Code_Album = Disque.Code_Album
		Inner join Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque
		Inner join Enregistrement ON Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
		Inner join Composition_Oeuvre ON Enregistrement.Code_Composition = Composition_Oeuvre.Code_Composition
		Where Composition_Oeuvre.Code_Oeuvre = ?");
        $requete->execute(array($codeOeuvre));
		
        while($donnees = $requete->fetch()) {
            echo "<span class=\"nom_album\">" . $donnees['Titre_Album'] . "</span> <br /> Année de l'album : " . $donnees['Annee_Album'] . "<br /> Genre de l'album : " . $donnees['Libelle_Abrege'] . " <br /> <br />";
             echo "<img src=\"photo_album.php?Code=" . $donnees['Code_Album'] . "\" /> <br /> <br />";
            echo "<a class=\"ajouter_panier\" href=\"ajouter_panier.php?action=ajouter&libelleProduit=" . $donnees['Titre_Album'] . "&qteProduit=1&prixProduit=2\" target=\"blank\"> Ajouter au panier (2€) </a> <br /> <br />";
		}
		
		$recuperer_enregistrements = $pdo->prepare('SELECT Enregistrement.Titre, Enregistrement.Code_Morceau FROM Enregistrement
		INNER JOIN Composition_Oeuvre ON Enregistrement.Code_Composition = Composition_Oeuvre.Code_Composition
		WHERE Enregistrement.Code_Composition = ?');
		$recuperer_enregistrements->execute(array($codeOeuvre));
		
		echo "<p><span class=\"enregistrement_titre\"> Enregistrements : </span> <br /> <br />";
		
		while($donnees_enregistrement = $recuperer_enregistrements->fetch()) {
			echo $donnees_enregistrement['Titre'];
			echo '<br /> <br /> <audio controls="controls" preload="none">'
            .'<source src="Enregistrement.php?CodeMorc=' . $donnees_enregistrement['Code_Morceau'] . '" type="audio/mp3" />'
            .'Votre navigateur n\'est pas compatible'
            .'</audio><br />';
		}
		
		echo "</p>";
		
        $pdo = null;
      }
    ?>
  </body>
</html>
