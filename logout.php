<?php session_start(); //Session start for destroy.

	/*
		This si user logout sended from index.php 
	*/

	//Mysql running check
	include"includes/mysql/mysqlActions.php"; //This is for mysqlRunningCheck call
	mysqlRunningCheck(); //This is check for mysql server (If mysql not running show error message)
	//End of running check

	//This si session destroy and redirect to index.php (Main page).
	if(session_destroy()) {
		header("Location: index.php"); //This si redirect after logout.
	}
	//End of user logout action.
?>
