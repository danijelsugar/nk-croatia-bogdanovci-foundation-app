<?php 

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