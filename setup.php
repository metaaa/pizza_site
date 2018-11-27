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
	mysqli_close($db);





	CREATE TABLE pizzas(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(60) NOT NULL,
    description TEXT NOT NULL,
    imageLink TEXT,
    price INT NOT NULL);

    delimiter ;;
	use 'pizza-site' ;;
    create
	definer 'metaaa'@'localhost'
	trigger 'link_change'
    before insert
	on 'pizzas'
    for each row
    begin
    	if (NEW.imageLink is null)
	then
        set NEW.imageLink = 'images/pizzas/default.jpg'
        end if;
    end; ;;
    delimiter;    */
?>