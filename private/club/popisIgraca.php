<?php
	include_once "../../configuration.php"; 
	$query = $connect->prepare("select * from igrac where klub=:sifra");
	$query->execute($_POST);
	$jsonResult = $query->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($jsonResult);
?>