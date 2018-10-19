<?php
	include_once "../../configuration.php"; 
	$query = $connect->prepare("select * from igrac");
	$query->execute();
	$jsonResult = $query->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($jsonResult);
?>