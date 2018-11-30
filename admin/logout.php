<?php
    session_start();
    //unset session
    session_unset($_SESSION['username'], $_SESSION['loggedin']);
    header('Location: ../index.php');