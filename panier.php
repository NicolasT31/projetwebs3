<?php 
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Albums </title>
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

  <h1> Panier d'achat 

    <?php 
      if(isset($_SESSION['pseudo'])) {
        echo " de " . $_SESSION['pseudo'];
      }
    ?>

  </h1>

  <?php 

  if(isset($_SESSION['pseudo'])) {

    echo "<a href=\"deconnexion.php\"> Se déconnecter </a> <br /> <br />";

    if(isset($_SESSION['panier'])) {
      $nombreArticles = count($_SESSION['panier']['libelleProduit']);
      if($nombreArticles <= 0) {
        echo "Votre panier est vide.";
      } else {
        for($i = 0; $i < $nombreArticles; $i++) {
           echo "<span class=\"panier\"> Album : " . $_SESSION['panier']['libelleProduit'][$i] . "<br /> Quantité : " . $_SESSION['panier']['qteProduit'][$i] . "<br /> Prix : " . $_SESSION['panier']['prixProduit'][$i] . "€ </span> <br />";
           echo "<a class=\"supprimer_panier\" href=\"ajouter_panier.php?action=supprimer&libelleProduit=" . $_SESSION['panier']['libelleProduit'][$i] . "\"> Supprimer cet album du panier </a> <br /> <br />";
        }
      }
    }

  } else { ?>

  <h1> Connexion </h1>

  <form method="POST" action="connexion_post.php"> 

  <input class="champ" type="text" name="pseudo" placeholder="Entrez votre pseudo" /> <br /> 
  <input class="champ" type="password" name="motdepasse" placeholder="Entrez votre mot de passe" /> <br /> <br />
  <input id="envoyer" type="submit" value="Envoyer" /> <br /> <br />

  </form>

  <?php }

  ?>
  	
  </body>

  </html>