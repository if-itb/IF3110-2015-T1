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
			if ($_POST['qid']!=""){
				$update = updateQuestion($_POST['qid'],$_POST['name'],$_POST['email'],$_POST['qtopic'],$_POST['content']);
				if($update != 0){
					echo 'Redirecting...';
					header('Location: DisplayQuestion.php?qid='.$_POST['qid'].'');
				}
				else {
					echo 'Error Submitting Question';
				}

			}else{
				$posted = submitQuestion($_POST['name'],$_POST['email'],$_POST['qtopic'],$_POST['content']);
				if($posted != 0){
					echo 'Redirecting...';
					header('Location: DisplayQuestion.php?qid='.$posted.'');
				}
				else {
					echo 'Error Submitting Question';
				}

			}
		?>
	</body>
</html> 