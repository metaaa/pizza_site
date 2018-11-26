<?php
	//database credentials
	$serverName = "localhost";
	$userName = "metaaa";
	$password = "admin123pws";
	$dbName = "pizza_site";
	//connecting to DB
	$connection = new mysqli($serverName, $userName, $password, $dbName);
	//check connection
    if ($connection->connect_errno){
        echo ("Connection failed: " . $connection->connect_error);
    }

    //include_once "setup.php";