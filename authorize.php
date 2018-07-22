<?php 

	if(!isset($_POST["user"])){
		exit;
	}

	include_once "configuration.php";

	if($_POST["user"]===""){
		header("location: login.php?message=2");
		exit;
	}

	if(($_POST["user"]==="dsugar" && $_POST["password"]==="d")
	||
	($_POST["user"]==="admin" && $_POST["password"]==="a")
	){
		$_SESSION["a"]=$_POST["user"];
		header("location: private/dashboard.php");
	}else {
		header("location: login.php?message=1");
	}