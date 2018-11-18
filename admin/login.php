<?php
	//initialize session
	session_start();
	//include config
	require_once "../config.php";
	//define empty variables
	$username = $password = "";
	//processing the data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//check if the username is empty
		if (empty(trim($_POST["USERNAME"]))){
			$usernameError = "Please enter a username!";
		} else {
			
		}
	}
}

?>