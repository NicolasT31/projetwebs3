<!DOCTYPE HTML>

<html>
<head>
	<title> Projet web S3 </title>
	<meta charset="utf-8" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> 
</head>

<style type="text/css">
@import url(style.css);

h2 {
	font-family: Roboto Condensed;
}

p {
	display: inline-block;
	width: 60%;
	text-align: justify;
	font-size: 15px;
	color: #636363;
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

	<h1> Bienvenue ! </h1>

	<p>
		Voici un site d'e-commerce relativement modeste réalisé dans le cadre du Projet Web S3. Cette page présentera brièvement le site avec quelques détails plus techniques à l'attention du correcteur. <br /> <br />

		Le site dispose d'un menu composé de plusieurs liens permettant d'accéder aux pages du même nom. 
		En ce qui concerne le Catalogue, deux formulaires sont disponibles. Plus en détails, voici ce qu'ils font. <br /> <br />

		- Le premier formulaire permet d'accéder à la liste des musiciens ayant pour initiale la lettre entrée dans le champ. Plusieurs informations sur ces-dits musiciens seront affichées. <br /> <br />

		- Le deuxième formulaire permet d'accéder aux oeuvres d'un musicien commençant par l'initiale entrée. Vous aurez la possibilité d'accéder aux albums dans lesquels ces oeuvres sont contenues. Vous pourrez également voir les enregistrements présents dans ces albums et en écouter des extraits. <br /> <br />

		Vous pouvez accéder à votre panier en cliquant sur le logo à gauche, se trouvant dans le menu. <br /> <br />

		La partie API Amazon demandée pour le projet n'a pas été réalisée. Cela n'est pas faute d'avoir essayé, mais les problèmes y ont été trop nombreux. En effet, le projet d'exemple GitHub déposé sur info-timide n'a pas été mis à jour depuis 5 ans, et après recherche sur internet, il semblerait qu'une nouvelle version de l'API Amazon ait été déployée, rendant obsolète et inutilisable la précédente. Nous avons malgré tout essayé, en vain. La démo de recherche d'articles Amazon proposé sur info-timide ne fonctionnait pas non plus. Nous sommes par conséquent dans le regret de reconnaître que nous n'y sommes pas parvenu, comme un bon nombre d'étudiants. Nous espérons que vous serez relativement indulgent quant à la notation de cette partie, qui était difficillement réalisable, selon nous.

	</p>

  <h2> Les fichiers du site en détail </h2>

  <p> 

    - acceder_album.php : page permettant d'accéder aux albums qu'une oeuvre contient <br /> 
    - ajouter_panier.php : permet d'ajouter ou supprimer des éléments dans le panier <br /> 
    - apropos.php : page "à propos" du site <br /> 
    - bdd_id.php : les identifiants de la base de données <br /> 
    - catalogue.php : contient les deux formulaires de recherche <br /> 
    - connexion_post.php : permet de se connecter et de créer la session <br /> 
    - deconnexion.php : permet de se déconnecter <br /> 
    - Enregistrement.php : permet d'afficher les extraits des enregistrements <br /> 
    - inscription.php : contient le formulaire d'inscription <br /> 
    - inscription_post.php : permet d'ajouter le nouvel utilisateur à la base de données <br /> 
    - liste_musiciens.php : liste des musiciens commençant par la lettre entrée par l'utilisateur <br /> 
    - musicien.php : page détaillée d'un musicien en particulier (contient toutes les informations sur celui-ci) <br /> 
    - panier.php : contient le panier d'achat <br /> 
    - photo2.php : permet d'afficher une photo sur une page à part <br /> 
    - photo3.php : permet d'afficher une photo de musicien directement sur une page <br /> 
    - photo_album.php : permet d'afficher une pochette d'album directement sur une page <br /> 
    - recuperer_oeuvres.php : permet de récupérer les oeuvres d'un musicien commençant par une lettre entrée par l'utilisateur <br /> 

  </p>


</body>
</html>