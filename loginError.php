<!DOCTYPE html>
<html lang="en">
<head>
	<?php //Import head for all pages.
		include"includes/head.php";
	?>
</head>
<body>
	<main>
		<h2 class="errorMSG">You entered the wrong name or password</h2>
		<?php header("Refresh:3; url=index.php"); ?>
	</main>
	<footer>
		<?php //Import footer for all pages.
			include"includes/footer.php";
		?>
	</footer>
</body>
</html>
