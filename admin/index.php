<?php
    session_start();
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
                        echo '<div class="card">
                                    <img src="../images/useravatars/img_avatar.png" alt="' . $_SESSION['username'] . '"><br>
                                    <p>' . $_SESSION['username'] . '</p>
                                    <div class="logOutBtn"><a style="color: white" href="logout.php">Log out</a></div>
                                    </div>';
                    ?>
                </div>
            </div>
            <div id="footer" class="divFooter">
                <div id="footerLeft" class="divFooterLeft"></div>
                <div id="footerRight" class="divFooterRight"></div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="../scripts/admin_functions.js"></script>
    <script src="../scripts/toast/toast.js"></script>
    <script src="../scripts/user_add_modal.js"></script>
    </body>
</html>