<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<?php
			include 'qDBFunct.php';	
			
			if(isset($_GET['qid']))	$qid = $_GET['qid'];
			else exit();
			$deleted = deleteQuestion($qid);
			if($deleted != 0){
				echo 'Redirecting...';
				header('Location: index.php');
			}
			else {
				echo 'Error deleting Question';
			}

		?>
	</body>
</html> 