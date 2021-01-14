<?php  
	//Mysql running check
	include"includes/mysql/mysqlActions.php"; //This is for mysqlRunningCheck call
	mysqlRunningCheck(); //This is check for mysql server (If mysql not running show error message)
	//End of running check

	if(isset($_POST['uplod_submit'])) //upload button click
	{
		$uploadfile=$_FILES["upload_file"]["tmp_name"]; //Set temp name for uploaded file temp dir must have 777 permissions
		$showName = $_FILES["upload_file"]["name"]; //get uploaded file name
		$folder="uploads/"; //Specific upload directory must have 777 permissions!
		$finish = move_uploaded_file($_FILES["upload_file"]["tmp_name"], $folder.$_FILES["upload_file"]["name"]); //Move file from temp to upload dir
		if ($finish) { //Show link on file
			echo '<p class="uploadFile">File Uploaded! http://localhost/bobfile/fileDownloader.php?fileName='.$showName.'</p>';
		} else { //If file upload filed send user to error page
			header("location:errorPage.php");
		}
	}

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
		<?php session_start();
			if (isset($_SESSION["login"])) { //Upload file form
				echo '<nav><p>User panel</p><a href="logout.php">Logout</a></nav>';
				echo '<form class="uploadForm" action="index.php" method="post" enctype="multipart/form-data"><p class="upload_title">File Upload</p><input type="file" class="file_chose_input" name="upload_file"/><br><input type="submit" class="upload_submit" name="uplod_submit" value="Upload"><br></form>';
			} else {
				include"includes/config.php";
				//This action use if user not logged (This is login form).
				echo '<h2 class="whatIsTitle">What is '.$pageName.'?</h2><p class="bobDesc"><strong>'.$pageName.'</strong> is total <strong>anonymous</strong> file share</p>';
				echo '<div class="loginForm"><p class="loginFormTitle">User login</p><form action="login.php" method="post"><input class="loginInput" type="text" name="username" placeholder="Username"><br><input class="loginInput" type="password" name="password" placeholder="Password"><br><input class="loginButton" type="submit" name="submit" value="Login"><br></form><p class="accountCreateText">You dont have account?</p><a class="createAccountLink" href="register.php">Create account</a></div>';
			}
		?>

	</main>
	<footer>
		<?php //Import footer for all pages.
			include"includes/footer.php";
		?>
	</footer>
</body>
</html>
