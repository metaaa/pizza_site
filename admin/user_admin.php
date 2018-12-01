<?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        //request data from the database which can be seen by the user


    } else {
        header('Location: ../index.php');
}