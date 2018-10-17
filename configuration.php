<?php 
	

	include_once "functions.php";
	session_start();
	$appName = "Nk Croatia Bogdanovci";
/*
	==============================
		Variable containing path
		to do root folder
	==============================
*/	
	switch($_SERVER["HTTP_HOST"]){
	    case "localhost":
		    $pathAPP="/nk_croatia_bogdanovci_app/Site/";
		    $connect = new PDO("mysql:host=localhost;dbname=croatia","edunova","edunova");
	    break;
	    case "dsugar.byethost16.com":
		    $pathAPP="/Site/";
		    $connect = new PDO("mysql:host=sql304.byethost.com;port=3306;dbname=b16_21955356_croatia","b16_21955356","bogibatina13");
	    break;
}

	$connect->exec("set names utf8;");
