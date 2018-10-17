<?php
	include_once "../../configuration.php"; 
	$query = $connect->prepare("select * from klub order by brojbodova desc;");
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_OBJ);
    print_r($result)
?>