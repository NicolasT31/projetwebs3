<?php 

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pseudo']) && isset($_POST['motdepasse'])) {
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$motdepasse = htmlspecialchars($_POST['motdepasse']);

	include "bdd_id.php";

	$ajout_abo = $pdo->prepare('INSERT INTO Abonne(Nom_Abonne, Prenom_Abonne, Login, Password) VALUES(?, ?, ?, ?)');
    $ajout_abo->execute(array($nom, $prenom, $pseudo, $motdepasse));

    header('location:panier.php');
}

?>