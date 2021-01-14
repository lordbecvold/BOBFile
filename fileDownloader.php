<!DOCTYPE html>
<html lang="en">
<head>
	<?php //Import head for all pages.
		include"includes/head.php";
	?>
</head>
<body>
	<main>
		<?php //File name for download get from url
			//Url Example http://localhost/bobfile/fileDownloader.php?fileName=server.jar
			$fileName = $_GET["fileName"];
			echo '<a class="donwloadButton" href="uploads/'.$fileName.'">Download '.$fileName.'</a>';

		?>
	</main>
	<footer>
		<?php //Import footer for all pages.
			include"includes/footer.php";
		?>
	</footer>
</body>
</html>
