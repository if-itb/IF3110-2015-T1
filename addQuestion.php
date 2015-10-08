<!--@author : Ignatius Alriana H.M / 13513051-->
<html>
	<head>
		<title>Submit Question - Simple StackExchange</title>
		<link rel="stylesheet" type="text/css" href="SiteStyle.css">
	</head>
	<body>
		<?php 
			include 'dbact.php';

			if (!(isset($_POST['id_q'])&&isset($_POST['Name'])&&isset($_POST['Email'])&&isset($_POST['Topic'])&&isset($_POST['Content']))){
				echo '<h2>Error</h2>';
				header("Location: ask.php");
				exit();
			}

			if ($_POST['id_q'] == '') $id = addQuestion($_POST['Name'], $_POST['Email'], $_POST['Topic'], $_POST['Content']);
			else $id = updateQuestion($_POST['id_q'], $_POST['Name'], $_POST['Email'], $_POST['Topic'], $_POST['Content']);
			 //header("Location: index.php?qid="); /* Redirect browser */
		?>
	</body>
</html>
