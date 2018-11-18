<?php
	//database credentials
	define('DB_SERVER','localhost');
	define('DB_USERNAME', 'metaaa');
	define('DB_PASSWORD', 'admin123pws');
	define('DB_NAME', 'pizza_site');
	//connect to DB
	$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	//check connection
	if ($link === false) {
		die("ERROR: Couldn't connect..." . $link => connect_error);
	}
?>