<?php
	//include config
    include "../config.php";
    $connection = new mysqli("localhost", "metaaa", "admin123pws", "pizza_site");
    //check connection
    if ($connection->connect_errno){
        echo ("Connection failed: " . $connection->connect_error);
    }
	//processing the data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//username & password have been sent
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);

		//select the user if it's exist
		$sqlQuery = "SELECT id,username,password,admin FROM users WHERE username = '$username' and password = '$password'";
		$queryResult = $connection->query($sqlQuery);
		//if there was any result
		if ($queryResult->num_rows > 0){
            $resultRow = $queryResult->fetch_assoc();
            //if login found ($userSelect = 1)
            if ($username == $resultRow["username"] && $password == $resultRow["password"]) {
                header('Location: /pizza_site/content-files/menu.php');
            }
		} else {
            echo "Wrong username or password!";
        }
	}
?>

<div class="loginPage">
    <div class="logRegForm">
        <form action="" class="register-form" method="POST">
            <input type="text" placeholder="username" name="regUsername"/>
            <input type="password" placeholder="password" name="regPassword"/>
            <input type="text" placeholder="email address" name="regEmail"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form action="" class="login-form" method="POST">
            <input type="text" placeholder="username" name="username"/>
            <input type="password" placeholder="password" name="password"/>
            <button>login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
    </div>
</div>
