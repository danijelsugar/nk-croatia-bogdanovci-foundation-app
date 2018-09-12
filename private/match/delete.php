<?php include_once "../../configuration.php"; 
if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

if(!isset($_GET["sifra"])){
  header("location: " . $pathAPP . "logout.php");
}

$query = $connect->prepare("delete from utakmica 
							where sifra=:sifra");
$query->execute($_GET);
header("location: index.php");