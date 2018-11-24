<?php
	//include config
    include "../config.php";
	//processing the data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//username & password have been sent
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = mysqli_real_escape_string($connection, $_POST['paassword']);

		//select the user if it's exist
		$sql = "SELECT username,password FROM users WHERE username = '$username' and password = '$password'";
		$selectUser =  mysqli_query($connection, $sql);
		$userFound = mysqli_num_rows(mysqli_fetch_array($selectUser, MYSQLI_ASSOC));

		//if login found ($result = 1)
		if ($username == $userFound["username"] && $password == $userFound["password"]) {
			header('Location: /pizza_site/content-files/menu.php');
		} else {
			echo "Wrong ussername or password!";
		}
	}
?>

    <script type="text/javascript">
        $('.message a').click(function(){
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
</script>



		<div id="loginContainer" class="loginContainer">
			<h2>Login</h2>
			<form action="" method="post">
				<label>Username</label><input type="text" name="username" class="box"/><br>
				<label>Password</label><input type="password" name="password" class="box"/><br>
				<input type="submit" value="Submit"/><br>
			</form>
        </div>

<div class="login-page">
    <div class="form">
        <form class="register-form">
            <input type="text" placeholder="name"/>
            <input type="password" placeholder="password"/>
            <input type="text" placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form">
            <input type="text" placeholder="username"/>
            <input type="password" placeholder="password"/>
            <button>login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
    </div>
</div>
