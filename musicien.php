<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Musicien </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Kavivanar" rel="stylesheet"> 
  </head>

  <style>
    @import url(style.css);

  h1 {
  	font-family: Kavivanar;
  	font-size: 40px;
  }

  .infos_musiciens {
  	text-transform: uppercase;
  	font-size: 18px;
  	letter-spacing: 3px;
  	color: gray;
  	font-weight: 300;
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

if(isset($_GET['Code'])) {
	$code = htmlspecialchars($_GET['Code']);
	include "bdd_id.php";

	$informations = $pdo->prepare('SELECT Nom_Musicien, Prenom_Musicien, Annee_Naissance, Annee_Mort, Pays.Nom_Pays, Instrument.Nom_Instrument FROM Musicien
	INNER JOIN Pays ON Musicien.Code_Pays = Pays.Code_Pays
	INNER JOIN Instrument ON Musicien.Code_Instrument = Instrument.Code_Instrument
	WHERE Code_Musicien = ?');
	$informations->execute(array($code));

	while($donnees = $informations->fetch()) {
		echo "<h1>" . $donnees['Nom_Musicien'] . ' ' . $donnees['Prenom_Musicien'] . '</h1> <br /> ';

		echo "<img src=\"photo3.php?Code=" . $code . "\" /> <br />";

		echo "<span class=\"infos_musiciens\">";

		if($donnees['Annee_Mort'] == NULL || $donnees['Annee_Mort'] == 0) {
			echo "Né en " . $donnees['Annee_Naissance'];
		} else {
			echo "(" . $donnees['Annee_Naissance'] . '-' . $donnees['Annee_Mort'] . ")";
		}

		echo "<br /> <br /> Nationnalité : " . $donnees['Nom_Pays'] . "<br /> <br /> Instrument joué : " . $donnees['Nom_Instrument'] . "<br /> <br /> Liste de ses oeuvres : <br /> <br />";

		echo "</span>";
	}

	/*$oeuvres = $pdo->prepare('SELECT Code_Oeuvre, Titre_Oeuvre FROM Oeuvre 
		INNER JOIN Composer ON Oeuvre.Code_Oeuvre = Composer.Code_Oeuvre 
		INNER JOIN Musicien ON Composer.Code_Musicien = Musicien.Code_Musicien
		WHERE Musicien.Code_Musicien = ?');
	$oeuvres->execute(array($code));*/

	$oeuvres = $pdo->prepare('SELECT Oeuvre.Code_Oeuvre, Oeuvre.Titre_Oeuvre FROM Musicien 
		INNER JOIN Composer ON Musicien.Code_Musicien = Composer.Code_Musicien
		INNER JOIN Oeuvre ON Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre
		WHERE Musicien.Code_Musicien = ?');
	$oeuvres->execute(array($code));

	while($o = $oeuvres->fetch()) {
		echo $o['Titre_Oeuvre'] . "<br /> <a href=\"acceder_albums.php?Oeuvre=" . $o['Code_Oeuvre'] . "\"> Accéder aux albums contenant cette oeuvre </a> <br /> <br />";
	}
}

?>

<br /> <br /> <br />

</body>

</html> 