<?php
    //if login data is correct start session
    session_start();
    //check connection
    if ($connection->connect_errno){
        echo ("Connection failed: " . $connection->connect_error);
    }
    //processing the data submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $regUsername = mysqli_real_escape_string($connection, $_POST['regUsername']);
        $regPassword = mysqli_real_escape_string($connection, $_POST['regPassword']);
        $regEmail = mysqli_real_escape_string($connection, $_POST['regEmail']);
        //check if all the fields are filled
        if (empty($_POST['regUsername']) || empty($_POST['regPassword']) || empty($_POST['regEmail'])){
            echo("Please, fill every fields!");
        } else{
            //check if the username or email is already registered
            $nameCheckQuery = "SELECT username,email FROM users WHERE username = '$regUsername' OR email = '$regEmail'";
            $checkQueryResult = $connection->query($nameCheckQuery);
            if ($checkQueryResult->num_rows > 0){
                $resultRow = $checkQueryResult->fetch_assoc();
                //check whether the username or the email is taken
                if ($regUsername == $resultRow["username"]){
                    echo("Username ('$regUsername') is taken!");
                } else {
                    echo("Email ('$regEmail') is already registered!");
                }
            //checks if the email is valid
            } elseif (!filter_var($regEmail, FILTER_VALIDATE_EMAIL)){
                echo "Invalid Email!";
            } else {
                $regQuery = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`) VALUES (NULL, '$regUsername', '$regEmail', '$regPassword', NULL)";
                $connection->query($regQuery);
                //setting up session
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $regUsername;
                header('Location:admin/index.php');
            }
        }
    }
//create snackbar