<?php 
	//Mysql56 connection var (IP, username, password, database_name)
	$connection = mysqli_connect("localhost", "root", "test", "bob_file");
	
	if (!$connection) { //Mysql connection check
		header("location:../../errorPage.php"); //If mysql not connected send user to error page
	}
?>