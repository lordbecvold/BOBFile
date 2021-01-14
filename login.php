<?php session_start(); //Session start for create sesstion.

	/*
		This si user login sended from index.php 
	*/

	//Mysql running check
	include"includes/mysql/mysqlActions.php"; //This is for mysqlRunningCheck call
	mysqlRunningCheck(); //This is check for mysql server (If mysql not running show error message)
	//End of running check

	//This action use if user click on submit (Login button).
	if (isset($_POST["submit"])) {

		//Includes
		include"includes/utils/hashUtil.php"; //This is include for genBlowFish function call
		include"includes/mysql/connect.php"; //Define mysql connection
		//End of includes

		//Save user data to variabiles
		$username = $_POST["username"];
		$password = $_POST["password"];
		//End of save data

		//Simple sql injection protect
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);
		//End of sql injection protection

		//genBlowFish called from hashUtil.php this create blowFish hash from user password
		$password = genBlowFish($password);

		//Load status from mysql readFromMysql called from mysqlAction.php
		$status = readFromMysql("SELECT status FROM users WHERE username = '$username'", "status");

		//Status check
		if ($status == "active") {
			//userLogin function called from mysqlAction.php
			userLogin("SELECT id FROM users WHERE username = '$username' and password = '$password'");		
		} elseif ($status == "deactive") {
			header("location:accountDeactive.php");
		} elseif ($status == "banned") {
			header("location:accountBanned.php");
		}
		//End of status check

	}
	//End of login action
?>