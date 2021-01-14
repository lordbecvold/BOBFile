<?php  
	//Mysql running check
	include"includes/mysql/mysqlActions.php"; //This is for mysqlRunningCheck call
	mysqlRunningCheck(); //This is check for mysql server (If mysql not running show error message)
	//End of running check
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php //Import head for all pages.
		include"includes/head.php";
	?>
</head>
<body>
	<main>
		<h2 class="accountError">Your account is not activated!</h2>
		<?php header("Refresh:3; url=index.php"); ?>
	</main>
	<footer>
		<?php //Import footer for all pages.
			include"includes/footer.php";
		?>
	</footer>
</body>
</html>
