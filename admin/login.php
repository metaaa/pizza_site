<?php
    require_once '../config.php';
    //if login data is correct start session
    session_start();
    //check connection
    if ($connection->connect_errno){
        echo ("Connection failed: " . $connection->connect_error);
    }
	//processing the data when form is submitted
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		//username & password have been sent
        $user = $_POST['username'];
        $userPass = $_POST['password'];
        if (!empty($user) && !empty($userPass)){
            //select the user if it's exist
            $sqlQuery = "SELECT * FROM users WHERE username = '$user' AND password = '$userPass'";
            //var_dump($sqlQuery);
            $queryResult = $connection->query($sqlQuery);
            if ($queryResult->num_rows > 0){
                $resultRow = $queryResult->fetch_assoc();
                //if login found ($userSelect = 1)
                if ($user == $resultRow["username"] && $userPass == $resultRow["password"]) {
                    //setting up session
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $user;
                    $_SESSION['admin'] = $resultRow['admin'];
                    echo "true";
                } else {
                    echo "false";
                }
            } else {
                echo "no_user_data_found";
            }
        }
	} else {
        echo "Error!";
    }

