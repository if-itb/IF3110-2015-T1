<!--@author : Ignatius Alriana H.M / 13513051-->
<html>
	<head>
		<title>Submit Question - Simple StackExchange</title>
		<link rel="stylesheet" type="text/css" href="SiteStyle.css">
	</head>
	<body>
		<?php 
			include 'dbact.php';

			if (!(isset($_POST['id_q'])&&isset($_POST['Name'])&&isset($_POST['Email'])&&isset($_POST['Content']))) {
				echo '<h2>Error</h2>';
				if (isset($_SERVER["HTTP_REFERER"])) {
					header("Location: " . $_SERVER["HTTP_REFERER"]);
				}
				exit();
			}

			$id = addAnswer($_POST['id_q'],$_POST['Name'], $_POST['Email'], $_POST['Content']);
			echo "Berhasil oom";
			header("Location: " . $_SERVER["HTTP_REFERER"]); /* Redirect browser */
		?>
	</body>
</html>
