<?php
    $pdo = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
    $stmt = $pdo->prepare("SELECT Photo FROM Musicien WHERE Code_Musicien=?");
    $stmt->execute(array($_GET['Code']));
	$data = $stmt->fetch();
	header('Content-type: image/jpeg');

    $photo = pack("H*", $data['Photo']);
		echo $photo;
?>
