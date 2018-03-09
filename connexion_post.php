<?php 
session_start();

if(isset($_POST['pseudo']) && isset($_POST['motdepasse'])) {
	if($_POST['pseudo'] != NULL && $_POST['motdepasse'] != NULL) {

		include "bdd_id.php";

		$pseudo = htmlspecialchars($_POST['pseudo']);
		$motdepasse = htmlspecialchars($_POST['motdepasse']);

		$recuperer_mdp = $pdo->prepare('SELECT Password FROM Abonne WHERE Login=?');
		$recuperer_mdp->execute(array($pseudo));
		$recuperer_mdp_row = $recuperer_mdp->fetch();

			if($recuperer_mdp_row['Password'] == $motdepasse) {
				$_SESSION['pseudo'] = $pseudo;
				header('location:panier.php');
			} else {
				echo "Login ou mot de passe invalide.";
			}

	}
}

?>