<!DOCTYPE html>
<html>
	<head>
		<title>Simple Stack Exchange </title>
		<link rel="stylesheet" type="text/css" href="Style.css">
	</head>
	<body>
		<?php
			if (!(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['content']))){
					echo '<h2>Error</h2>';
					header("Location: DisplayQuestion.php");
					exit();
				}
			
			include 'aDBFunct.php';			
				
				$posted = submitAnswer($_POST['qid'],$_POST['name'],$_POST['email'],$_POST['content']);
				if($posted != 0){
					echo 'Redirecting...';
					header('Location: DisplayQuestion.php?qid='.$_POST['qid'].'');
				}
				else {
					echo 'Error Submitting Question';
				}

		?>
	</body>
</html> 