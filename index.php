<?php
	require_once 'config.php';
	session_start();
	//configuring session timeout
	//getting server time
	$time = $_SERVER['REQUEST_TIME'];
	$timeout_duration = 120;
	//look for latest activity timestamp
    if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
        session_unset();
        session_destroy();
        session_start();
        header('Location: index.php');
    }
    $_SESSION['LAST_ACTIVITY'] = $time;
?>

<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="css/default.css">

<html>

	<head>
		<title>order pizza by metaaa</title>
	</head>
	<body class="divBody">
		<div id="siteArea" class="divSiteArea">
			<div id="header" class="divHeader"></div>
			<div id="mainMenu" class="divMainMenu">
                <ul class="mainMenuList" id="mainMenuList">
                    <?php
                        include 'content-files/menu.php';
                    ?>
                </ul>
			</div>
			<div class="divDivider" ></div>
			<div id="content" class="divContent">
				<div id="leftColumn" class="divLeftColumn">
					<?php
                    //set the content for the pages
                    $pagesDir = 'content-files';
                    if (!empty($_GET['page'])){
                        $pages = scandir($pagesDir,0);
                        unset($pages[0], $pages[1]);
                        $page =  $_GET['page'];
                        if (in_array($page . '.php', $pages)){
                            include ($pagesDir . '/' . $page . '.php');
                        } else {
                            echo "Page not found...";
                        }
                    } else{
                        include ($pagesDir . '/home.php');
                    }
					?>
				</div>
				<div id="rightColumn" class="divRightColumn">
                    <?php
                        if ($_SESSION['loggedin'] == false){
                            include 'admin/login_form.php';
                        } else {
                            echo 'You are logged in as ' . $_SESSION['username'] . '.</br>For Log out click <a href="admin/logout.php">here</a>';
                        }
                    ?>
				</div>
			</div>
			<div id="footer" class="divFooter">
				<div id="footerLeft" class="divFooterLeft"></div>
				<div id="footerRight" class="divFooterRight"></div>
			</div>
		</div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script  src="scripts/login_form.js"></script>
	</body>
</html>