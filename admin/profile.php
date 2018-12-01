<?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        //select everything from the users database
        $sqlQuery = "SELECT * FROM users WHERE username = '$username'";
        $queryResult = $connection->query($sqlQuery);
        //if there was any result
        if ($queryResult->num_rows > 0) {
            $resultRow = $queryResult->fetch_assoc();
        }
    } else {
        header('Location: ../index.php');
    }