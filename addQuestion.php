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

			if ($_POST['id_q'] == ''){
				$id = addQuestion($_POST['Name'], $_POST['Email'], $_POST['Topic'], $_POST['Content']);
				$q = getLastQid();
				$id_q = $q['id_q'];
			}
			else {
				$id = updateQuestion($_POST['id_q'], $_POST['Name'], $_POST['Email'], $_POST['Topic'], $_POST['Content']);
				$id_q=$_POST['id_q'];
				
			}

			$id_q=trim($id_q);
			echo $id_q;
			header("Location: displayQuestion.php?id_q=+".basename($id_q).""); /* Redirect browser */
		?>
	</body>
</html>
