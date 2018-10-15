<?php 

	if(!isset($_POST["user"])){
		exit;
	}

	include_once "configuration.php";

	if($_POST["user"]===""){
		header("location: login.php?message=2");
		exit;
	}

	$query = $connect->prepare("select * from operater where email=:email");
	$query->execute(array("email"=>$_POST["user"]));

	$operater = $query->fetch(PDO::FETCH_OBJ);

	if($operater !=null && $operater->lozinka==password_verify($_POST["password"],$operater->lozinka)){
		//pusti dalje
		$operater->lozinka="";
		$_SESSION["a"]=$operater;
		header("location: private/dashboard.php");
	}else {
		header("location: login.php?message=1");
	}