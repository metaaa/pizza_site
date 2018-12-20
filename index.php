<?php
    require_once 'config.php';
	session_start();
	//configuring session timeout
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
    $_SESSION['LAST_ACTIVITY'] = $time;
?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/default.css">
<link href="favicon.ico" rel="icon" type="image/x-icon" />
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
                    if (!$_SESSION['loggedin'] && !isset($_SESSION['loggedin'])) {
                        echo '<div class="loginPage">
                                <div id="logRegForm" class="logRegForm">
                                    <form action="admin/register.php" class="register-form" id="register-form" method="POST" onsubmit="register(event)">
                                        <input id="regUsername" name="regUsername" placeholder="username" type="text" autocomplete="username"/>
                                        <input id="regPassword" name="regPassword" placeholder="password" type="password" autocomplete="current-password"/>
                                        <input id="regEmail" name="regEmail" placeholder="email address" type="text" autocomplete="email"/>
                                        <button id="buttonReg" name="submit" type="submit" value="Submit">create</button>
                                        <p class="message">Already registered? <a href="#">Sign In</a></p>
                                    </form>
                                    <form action="admin/login.php" class="login-form" id="login-form" method="POST" onsubmit="login(event)">
                                        <input id="usernameLogin" name="username" placeholder="username" type="text" autocomplete="username"/>
                                        <input id="passwordLogin" name="password" placeholder="password" type="password" autocomplete="current-password"/>
                                        <button id="buttonLogin" name="submit" type="submit" value="Login">login</button>
                                        <p class="message">Not registered? <a href="#">Create an account</a></p>
                                    </form>
                                    <div id="errorMessage" class="errorMessage" style="display: none">
                                        <p>Invalid data!</p>
                                    </div>
                                </div>';
                    } else {
                        echo '<div class="card">
                                <img src="images/useravatars/img_avatar.png" alt="' . $_SESSION['username'] . '"><br>
                                <a href="admin/">' . $_SESSION['username'] . '<br> [admin area]</a>
                                <button><a style="color: white" href="admin/logout.php">Log out</a></button>
                                </div>';
                    }
                ?>
			</div>
			<div id="footer" class="divFooter">
				<div id="footerLeft" class="divFooterLeft"></div>
				<div id="footerRight" class="divFooterRight"></div>
			</div>
		</div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <script  src="scripts/login_form.js"></script>
        <script  src="scripts/toast/toast.js"></script>
	</body>
</html>