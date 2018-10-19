<?php
	include_once "configuration.php"; 
	$query = $connect->prepare("select * from klub igrac where sifra=:sifra;");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
?>