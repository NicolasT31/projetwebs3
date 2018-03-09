<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> 
    <title> Formulaire </title>
  </head>

  <style>
  @import url(style.css);

  input {
    color: gray;
    border: 1px solid #c8c8c8;
    font-size: 17px;
    padding: 5px;
    width: 350px;
  	border-radius: 20px;
  }
  
  .intitule {
	font-family: Roboto Condensed;
	letter-spacing: 1px;
	color: #484848;
	font-size: 17px;
	}
  
  .envoyer {
		width: auto;
		padding: 5px 20px 5px 20px;
		background-color: #34d9ec;
		border: none;
		color: white;
		transition: all ease 500ms;
  }
  
  .envoyer:hover {
	    cursor: pointer;
		background-color: #3471ec;
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
	
	  <br /> <br />
  
      <form method="POST" action="liste_musiciens.php">
          <span class="intitule"> Récupérer un Musicien : </span> <br /> <br />
          <input type="text" name="initiale" placeholder="Entrez l'initiale des musiciens à récupérer" /> <br /> <br />
		  <input type="submit" class="envoyer" value="Envoyer" />
      </form> <br /> <br />
	  
	    <form method="POST" action="recuperer_oeuvres.php">
          <span class="intitule"> Récupérer une oeuvre d'un musicien commençant par : </span> <br /> <br />
          <input type="text" name="initiale" placeholder="Entrez l'initiale ici" /> <br /> <br />
		  <input type="submit" class="envoyer" value="Envoyer" />
      </form> <br /> <br />

      <!--<form method="POST" action="add.php">
        Insérer un Abonné : <br /> <br />
        <input type="text" name="abo" placeholder="Nom abonné" /> <br /> <br />
        <input type="text" name="login" placeholder="Login" /> <br /> <br />
        <input type="password" name="pass" placeholder="Mot de passe" /> <br /> <br />
        <input type="text" name="mail" placeholder="E-mail" /> <br /> <br />

        <input type="submit" value="Envoyer" />-->
      </form>
  </body>
</html>
