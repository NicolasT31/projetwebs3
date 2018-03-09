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

  <h1> Inscription </h1>

  <form method="POST" action="inscription_post.php"> 

  <input type="text" class="champ" name="nom" placeholder="Entrez votre nom" /> <br />
  <input type="text" class="champ" name="prenom" placeholder="Entrez votre prénom" /> <br />
  <input type="text" class="champ" name="pseudo" placeholder="Entrez votre pseudo" /> <br />
  <input type="password" class="champ" name="motdepasse" placeholder="Entrez votre mot de passe" /> <br /> <br />
 
  <input type="submit" id="envoyer" value="Envoyer" />

  </form> <br /> <br />
  	
  </body>

  </html>