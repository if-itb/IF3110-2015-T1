<!--@author : Ignatius Alriana H.M / 13513051-->
<html>
	<head>
		<title>Submit Question - Simple StackExchange</title>
		<link rel="stylesheet" type="text/css" href="SiteStyle.css">
	</head>
	<body>
		<?php 
			include 'dbact.php';

			if (!(isset($_POST['Name'])&&isset($_POST['Email'])&&isset($_POST['Topic'])&&isset($_POST['Content']))){
				echo '<h2>Something is wrong</h2>';
				header("Location: ask.php");
				exit();
			}

			$id = addQuestion($_POST['Name'], $_POST['Email'], $_POST['Topic'], $_POST['Content']);
			// header("Location: displayQuestion.php?qid=".$qid); /* Redirect browser */
		?>
	</body>
</html>
