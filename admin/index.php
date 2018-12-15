<?php
require_once '../config.php';
session_start();
/*//configuring session timeout
//getting server time
$time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 1800;
//look for latest activity timestamp
if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    session_start();
    header('Location: index.php');
}
$_SESSION['LAST_ACTIVITY'] = $time;*/

?>

<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="../css/default.css">
<link href="../images/favicon.ico" rel="icon" type="image/x-icon">

<html>
    <head>
        <title>order pizza by metaaa</title>
    </head>
    <body class="divBodyAdmin">
        <div id="siteArea" class="divSiteArea">
            <div id="header" class="divHeader"></div>
            <div id="mainMenu" class="divMainMenu">
                <ul class="mainMenuList" id="mainMenuList">
                    <?php
                        include '../content-files/menu.php';
                    ?>
                </ul>
            </div>
            <div class="divDivider" ></div>
            <div id="content" class="divContent">
                <div id="leftColumn" class="divLeftColumn">
                    <?php
                        include 'user_admin.php';
                    ?>
                </div>
                <div id="rightColumn" class="divRightColumn">
                    <?php
                    //HERE COMES THE PROFILE
                    ?>
                </div>
            </div>
            <div id="footer" class="divFooter">
                <div id="footerLeft" class="divFooterLeft"></div>
                <div id="footerRight" class="divFooterRight"></div>
            </div>
        </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<!--    <script  src="../scripts/user_handling.js"></script>-->
    </body>
</html>