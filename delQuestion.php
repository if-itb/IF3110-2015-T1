<!--@author : Ignatius Alriana H.M / 13513051-->
<html>
	<head>
		<title>Delete Question - Simple StackExchange</title>
		<link rel="stylesheet" type="text/css" href="SiteStyle.css">
	</head>
	<body>
		<?php 
			include 'dbact.php';

			if (!(isset($_GET['id_q']))){
				echo '<h2>Error</h2>';
				if (isset($_SERVER["HTTP_REFERER"])) {
					//header("Location: " . $_SERVER["HTTP_REFERER"]);
				}
				exit();
			}
			$id = $_GET['id_q'];
			
			$res = delQuestion($id);
			 header("Location: index.php?");
		?>
	</body>
</html>
