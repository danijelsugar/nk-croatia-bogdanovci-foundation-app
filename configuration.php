<?php 
	

	include_once "functions.php";
	session_start();
	$appName = "Nk Croatia Bogdanovci";

	switch($_SERVER["HTTP_HOST"]){
	    case "localhost":
		    $pathAPP="/nk_croatia_bogdanovci_app/Site/";
	    break;
	    case "dsugar.byethost16.com":
		    $pathAPP="/nk_croatia_bogdanovci_app/";
	    break;
}


	$connect = new PDO("mysql:host=localhost;dbname=croatia","edunova","edunova");
	$connect->exec("set names utf8;");