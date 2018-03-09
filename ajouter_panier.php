<?php 
session_start();
?>

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

  span {
    font-family: Roboto Condensed;
    font-size: 26px;
  }

  span a {
    color: rgba(41, 128, 185,1.0);
    text-decoration: none;
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

if(!isset($_SESSION['panier'])) {
	  $_SESSION['panier'] = array();
      $_SESSION['panier']['libelleProduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
      $_SESSION['panier']['prixProduit'] = array();
}

function ajouterArticle($libelleProduit, $qteProduit, $prixProduit) {
	// Le produit qu'on souhaite ajouter : est-il déjà présent dans le panier ? Oui : on augmente la quantité. Non : On ajoute le produit.
	$produitExiste = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);

	if($produitExiste != false) {
		$_SESSION['panier']['qteProduit'][$produitExiste] += $qteProduit;
	} else {
		 array_push( $_SESSION['panier']['libelleProduit'], $libelleProduit);
         array_push( $_SESSION['panier']['qteProduit'], $qteProduit);
         array_push( $_SESSION['panier']['prixProduit'], $prixProduit);
	}
}

function supprimerArticle($libelleProduit) {
	// Panier temporaire (qui contient les articles sans les produits à supprimer)
	  $tmp = array();
      $tmp['libelleProduit'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();

      for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++) {

         if ($_SESSION['panier']['libelleProduit'][$i] != $libelleProduit)
         {
            array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
         }

      }
      
      $_SESSION['panier'] =  $tmp;
      
      unset($tmp);
}

function MontantPanier(){
   $montant = 0;

   for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
   {
      $montant += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }

   return $montant;
}

if(isset($_GET['action']) && isset($_GET['libelleProduit'])) {

	$libelleProduit = htmlspecialchars($_GET['libelleProduit']);

	if($_GET['action'] == "ajouter") {
		if(isset($_GET['qteProduit']) && isset($_GET['prixProduit'])) {
			$qteProduit = htmlspecialchars($_GET['qteProduit']);
			$prixProduit = htmlspecialchars($_GET['prixProduit']);

			if(isset($_SESSION['pseudo'])) {
				ajouterArticle($libelleProduit, $qteProduit, $prixProduit);
				echo "<br /> <img src=\"https://zupimages.net/up/18/03/9mzf.png\" /> <br /> <br /> <span>Cet album a bien été ajouté à votre panier ! <a href=\"panier.php\">Accéder à mon panier</a></span>";
			} else {
				echo "<br /> <img src=\"https://zupimages.net/up/18/03/k77k.png\" /> <br /> <br /> <span>Vous devez être connecté pour ajouter un album à votre panier. <a href=\"panier.php\">Connexion au panier</a></span>";
			}
		}
	} else if ($_GET['action'] == "supprimer") {
		supprimerArticle($libelleProduit);
		header('location:panier.php');
	}
}

?>

</body> 

</html>