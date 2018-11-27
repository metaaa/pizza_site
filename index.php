<?php
	require_once 'config.php';
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
				<?php
					include 'content-files/menu.php';
				?>
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
                    <div class="loginPage">
                        <div class="logRegForm">
                            <form action="" class="register-form" method="POST">
                                <input name="regUsername" placeholder="username" type="text"/>
                                <input name="regPassword" placeholder="password" type="password"/>
                                <input name="regEmail" placeholder="email address" type="text"/>
                                <?php
                                include 'admin/register.php';
                                ?>
                                <button>create</button>
                                <p class="message">Already registered? <a href="#">Sign In</a></p>
                            </form>
                            <form action="" class="login-form" method="POST">
                                <input name="username" placeholder="username" type="text"/>
                                <input name="password" placeholder="password" type="password"/>
                                <?php
                                include 'admin/login.php';
                                ?>
                                <button>login</button>
                                <p class="message">Not registered? <a href="#">Create an account</a></p>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
			<div id="footer" class="divFooter">
				<div id="footerLeft" class="divFooterLeft"></div>
				<div id="footerRight" class="divFooterRight"></div>
			</div>
		</div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script  src="scripts/login_form.js"></script>
	</body>
</html>