<!DOCTYPE html>
<html>
	<head>
		<title>Simple Stack Exchange </title>
		<link rel="stylesheet" type="text/css" href="Style.css">
	</head>
	<body>
		<?php
			if (!(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['qtopic'])&&isset($_POST['content']))){
					echo '<h2>Error</h2>';
					header("Location: Question.php");
					exit();
				}
			
			include 'qDBFunct.php';
			$qid = submitQuestion($_POST['name'],$_POST['email'],$_POST['qtopic'],$_POST['content']);
			if($qid != 0){
				echo 'Redirecting...';
				header('Location: index.php');
			}
			else {
				echo 'Error Submitting Question';
			}
		?>
	</body>
</html> 