<?php
include "bdd_id.php";
$stmt = $pdo->prepare("SELECT Extrait "
        . "FROM Enregistrement "
        . "WHERE Code_Morceau=?");
$stmt->execute(array($_GET['CodeMorc']));
$stmt->bindColumn(1, $data, PDO::PARAM_LOB);
$stmt->fetch(PDO::FETCH_BOUND);
$musique = pack("H*", $data);
header("Content-Type: audio/mpeg");
echo $musique;
?>