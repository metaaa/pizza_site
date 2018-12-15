<?php
    //if login data is correct start session
    session_start();
    global $connection;
    //check connection
    if ($connection->connect_errno){
        echo ("Connection failed: " . $connection->connect_error);
    }
	//processing the data when form is submitted
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //if ($_GET['username'] !== ""){
		//username & password have been sent
        $username = $_POST['username'];
        $password = $_POST['password'];
        //var_dump($username, $password);
		//select the user if it's exist
		$sqlQuery = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		//var_dump($sqlQuery);
		$queryResult = $connection->query($sqlQuery);
		echo "asd";
		//if there was any result
		if ($queryResult->num_rows > 0){
            $resultRow = $queryResult->fetch_assoc();
            //if login found ($userSelect = 1)
            if ($username == $resultRow["username"] && $password == $resultRow["password"]) {
                //setting up session
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['admin'] = $resultRow['admin'];
                echo "success";
            }
		}
	} else {
        echo "false";
        var_dump("false", $username, $password);
    }

