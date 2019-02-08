<?php
    require_once '../config.php';
    //if login data is correct start session
    session_start();
    //check connection
    if ($connection->connect_errno){
        echo ("Connection failed: " . $connection->connect_error);
    }
    //processing the data submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $regUsername = $_POST['username'];
        $regPassword = $_POST['password'];
        $regEmail = $_POST['email'];

        //check if all the fields are filled
        if (!empty($regUsername) && !empty($regEmail) && !empty($regPassword)){
            //check if the username or email is already registered
            $nameCheckQuery = "SELECT username,email,password FROM users WHERE username = '$regUsername' OR email = '$regEmail'";
            $checkQueryResult = $connection->query($nameCheckQuery);
            if ($checkQueryResult->num_rows > 0){
                $resultRow = $checkQueryResult->fetch_assoc();
                //check whether the username or the email is taken
                if ($regUsername == $resultRow["username"] && $regEmail !== $resultRow["email"]){
                    echo("username_error");
                } elseif ($regUsername !== $resultRow["username"] && $regEmail == $resultRow["email"]) {
                    echo("email_error");
                }
            //checks if the email is valid
            } elseif (!filter_var($regEmail, FILTER_VALIDATE_EMAIL)){
                echo "invalid_email";
            } else {
                $regQuery = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`) VALUES (NULL, '$regUsername', '$regEmail', '$regPassword', NULL)";
                $connection->query($regQuery);
                //setting up session
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $regUsername;
                echo "true";
            }
        }
    }
