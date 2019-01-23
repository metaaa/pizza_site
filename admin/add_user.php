<?php
require_once '../config.php';
//if login data is correct start session
session_start();
//check connection
if ($connection->connect_errno){
    echo ("Connection failed: " . $connection->connect_error);
}
//processing the data submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $newUsername = $_POST['username'];
    $newUserEmail = $_POST['email'];
    $newUserAdmin = $_POST['admin'];
    //var_dump($newUsername, $newUserEmail);
    if (!empty($newUsername) && !empty($newUserEmail)) {
        $nameCheckQuery = "SELECT username,email FROM users WHERE username = '$newUsername' OR email = '$newUserEmail'";
        $checkQueryResult = $connection->query($nameCheckQuery);
        if ($checkQueryResult->num_rows > 0) {
            $resultRow = $checkQueryResult->fetch_assoc();
            //check whether the username or the email is taken
            if ($newUsername == $resultRow["username"] && $newUserEmail !== $resultRow["email"]) {
                echo("username_error");
            } elseif ($newUsername !== $resultRow["username"] && $newUserEmail == $resultRow["email"]) {
                echo("email_error");
            }
            //checks if the email is valid
        } elseif (!filter_var($newUserEmail, FILTER_VALIDATE_EMAIL)) {
            echo "invalid_email";
        } else {
            //generate random password
            $newUserPassword = random_password(8);
            //check whether it's admin or not
            $newUserAdmin = ($newUserAdmin == "") ? NULL : 1;
            $newUserQuery = "INSERT INTO users (username, email, password, admin) VALUES ($newUsername, $newUserEmail, $newUserPassword $newUserAdmin)";
            $connection->query($newUserQuery);
            echo "new_user_added";
        }
    } else {
        echo "no_submitted_data";
    }
} else {
    echo "server_error";
}

function random_password($length){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_-/!";
    return substr(str_shuffle($chars),0, $length);
}