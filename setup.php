<?php


//THIS WILL BE A ONE TIME SETUP FOR SQL TABLES




	//incluse config for credentials
	//include_once "config.php";
	//table setup
	$tablesCreated = false;
	//check connection
	/*if ($db === false){
		die("ERROR: Couldn't connect to database...");
	}
	//SQL for CREATE TABLE
	if (!$tablesCreated){
		$sqlQuery = "CREATE TABLE users(
					id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
					username VARCHAR(30) NOT NULL,
	                email VARCHAR(60) NOT NULL,
					password VARCHAR(20) NOT NULL,
	                admin TINYINT(1) default 0)";
	}
	if (mysqli_query($db, $sqlQuery)){
		echo "Table created succesfully.";
		$tablesCreated = 1;
	} else {
		echo "Couldn't create TABLE";
	}
	mysqli_error($db);
	//closes connection
	mysqli_close($db);*/
?>