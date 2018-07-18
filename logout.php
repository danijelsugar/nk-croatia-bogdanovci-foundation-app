<?php 
	include_once "configuration.php";

	unset($_SESSION["a"]);
	header("location: index.php");