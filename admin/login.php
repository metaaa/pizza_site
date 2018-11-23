<?php
	//include config
	include "../config.php";
	//initialize session
	session_start();
	//define empty variables
	//$username = $password = "";
	//$usernameError = $passwordError = "";

	//processing the data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//username & password have been sent
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['paassword']);

		//prepare sql statement
		$sql = "SELECT id FROM users WHERE username = '$username' and password = '$password'";
		$established =  mysql_query($db, $sql);
		$row = mysqli_fetch_array($established, MYSQLI_ASSOC);
		$active = $row['active'];
		$count = mysqli_num_rows($established);

		//if login found ($result = 1)
		if ($count == 1) {
			session_register("username");
			header("../admin/admin.php");
		} else {
			$error = "Wrong ussername or password!";
		}
	}
?>

<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<div id="loginContainer" class="loginContainer">
			<h2>Login</h2>
			<form action="" method="post">
				<label>Username</label><input type="text" name="username" class="box"/><br>
				<label>Password</label><input type="password" name="password" class="box"/><br>
				<input type="submit" value="Submit"/><br>
			</form>
			<div id="loginError" class="loginError">
				<?php
					echo "$error";
				?>
			</div>
	</body>
</html>