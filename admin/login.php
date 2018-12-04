<?php
    //if login data is correct start session
    session_start();
    //check connection
    if ($connection->connect_errno){
        echo ("Connection failed: " . $connection->connect_error);
    }
	//processing the data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//username & password have been sent
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);

		//select the user if it's exist
		$sqlQuery = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$queryResult = $connection->query($sqlQuery);
		//if there was any result
		if ($queryResult->num_rows > 0){
            $resultRow = $queryResult->fetch_assoc();
            //if login found ($userSelect = 1)
            if ($username == $resultRow["username"] && $password == $resultRow["password"]) {
                //setting up session
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['admin'] = $resultRow['admin'];
                header('Location:admin/index.php');
            }
		} else {
            echo "Wrong username or password!";
        }
	}
