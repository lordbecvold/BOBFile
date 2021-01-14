<?php //Mysql actions callable from all components

	function mysqlQuery($query) { //Mysql send query function call
		include"includes/mysql/connect.php"; //Define mysql connection
		mysqli_query($connection, $query); //Query insert to mysql
	}

	function userExistCheck($username) { //This si check for user exist in register etc
		include"includes/mysql/connect.php"; //Define mysql connection
		if (mysqli_num_rows(mysqli_query($connection, "SELECT * from users WHERE username = '$username'")) > 0) { //Send mysql query for check
			return true; //Set user exist true returned
		}
	}

	function userLogin($query) { //This is function for user login
		include"includes/mysql/connect.php"; //Define mysql connection
		$result = mysqli_query($connection, $query); //This si select mysql query for login action
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		if ($count == 1) {
			$_SESSION["login"] = true; //This is set for session after login
			$loggName = $username;
			$status = $status;
			header("location:index.php"); //This is redirect to index after set session
		} else { // if user cant log 
			header("location:loginError.php"); //redirect and show error message
		}
	} 

	function mysqlRunningCheck() { //This is for mysql running check called from all pages
		include"includes/mysql/connect.php"; //Define mysql connection
		if (!$connection) { //Mysql connection check
			header("location:errorPage.php"); //If mysql not connected send user to error page
		}
	}

	function readFromMysql($query, $specifis) {
		include"includes/mysql/connect.php"; //Define mysql connection
		$sql=mysqli_fetch_assoc(mysqli_query($connection, $query));
		return $sql[$specifis];
	}
?>
