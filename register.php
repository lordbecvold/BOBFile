<?php session_start(); //Start session for check if user is logged.
	
	//Mysql running check
	include"includes/mysql/mysqlActions.php"; //This is for mysqlRunningCheck call
	mysqlRunningCheck(); //This is check for mysql server (If mysql not running show error message)
	//End of running check

	//Check of user login
	if (isset($_SESSION["login"])) {
		header("location:index.php");	
	}
	//End of user login check

	//Register action (register button accept)
	if (isset($_POST["submit"])) {


		//Save user data to variabiles
		$username = $_POST["username"];
		$password = $_POST["password"];
		$repassword = $_POST["repassword"];
		$status = "active"; //This is set status to active in register automaticly
		//End of save data

		//Simple sql injection protect
		include"includes/mysql/connect.php"; //Define mysql connection
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);
		$repassword = mysqli_real_escape_string($connection, $repassword);
		$status = mysqli_real_escape_string($connection, $status);
		//End of sql injection protection

		if (empty($username) or empty($password) or empty($repassword)) { //This is check for empty dates
			echo '<p class="registerError">You must enter all data</p>';
		} elseif (strlen($password) < 4) { //This is check for mininal characters in password
			echo '<p class="registerError">Password must contain 5 characters</p>';
		} elseif ($password != $repassword) { //This is check for password is matched
			echo '<p class="registerError">Passwords do not match</p>';
		} else {
			//Includes
			include"includes/utils/hashUtil.php"; //This is include for genBlowFish function call
			//End of includes

			//genBlowFish called from hashUtil.php this create blowFish hash from user password
			$password = genBlowFish($password);

			if (userExistCheck($username)) { //Username registred exist check called from mysqlAction.php
				echo '<p class="registerError">Username taken</p>';
			} else {
				//mysqlQuery called from mysqlAction.php and insert data to mysql table users
				mysqlQuery("INSERT INTO `users`(`username`, `password`, `status`) VALUES ('$username', '$password', '$status')");
				echo '<p class="registerError">The account has been created you can log in</p>';
			}
		}
	}
	//End of register action
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php //Import head for all pages
		include"includes/head.php";
	?>
</head>
<body>
	<main>
		<!--Register form-->
		<div class="loginForm">
			<p class="registerFormTitle">User Register</p>
			<form action="register.php" method="post">
				<input class="loginInput" type="text" name="username" placeholder="Username"><br>
				<input class="loginInput" type="password" name="password" placeholder="Password"><br>
				<input class="loginInput" type="password" name="repassword" placeholder="Password again"><br>
				<input class="registerButton" type="submit" name="submit" value="Register"><br>
			</form>
			<p class="accoutLoginText">You have account?</p>
			<a class="accountLoginLink" href="index.php">Login</a>
		</div>
		<!--Register form end-->
	</main>
	<footer>
		<?php //Import footer for all pages
			include"includes/footer.php";
		?>
	</footer>
</body>
</html>
