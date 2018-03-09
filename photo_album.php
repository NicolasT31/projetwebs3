<?php
    $pdo = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
    $stmt = $pdo->prepare("SELECT Pochette FROM Album WHERE Code_Album=?");
    $stmt->execute(array($_GET['Code']));
	$data = $stmt->fetch();
	header('Content-type: image/jpeg');

    $photo = pack("H*", $data['Pochette']);
		echo $photo;
?>
