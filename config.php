<?php
	//database credentials
	$serverName = "localhost";
	$userName = "metaaa";
	$password = "admin123pws";
	$dbName = "pizza_site";
	//connecting to DB
	$connection = new mysqli($serverName, $userName, $password, $dbName);
	//check connection
    if ($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }
    echo "Connected successfully!";

    include_once "setup.php";
?>