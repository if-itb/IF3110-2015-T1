<!DOCTYPE html>
<html>
<head>
<title>Stack Exchange</title>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="header">
		<center><h1><a href="index.php">Simple StackExchange</a></h1></center>
	</div>
	<div class="content">
		<?php
			include "function/database.php";
			$conn = connect_database();

			$sql = "SELECT * FROM `question` WHERE question_id=".$_GET["q_id"];
			$result = mysqli_query($conn,$sql);
			show_query_ask($result);
			if(mysqli_num_rows($result) > 0) {
				$isQuestionExist = true;
			}
			else {
				echo "Cannot find what you are looking for.";
				$isQuestionExist = false;
			}
			$sql = "SELECT * FROM `answer` WHERE question_id=".$_GET["q_id"];
			$result = mysqli_query($conn,$sql);
			echo "<h2>".mysqli_num_rows($result)." Answer(s)</h2>";
			show_query_answer($result);
		?>
		<?php 
		if($isQuestionExist) { ?>
		<br><br><br>
		<form id="question-form" action="submit.php?q_id=<?php echo $q_id."&idx=4";?>" method="post">
			<center>
				<input type="text" name="name" placeholder="name"><br>
				<input type="text" name="email" placeholder="email"><br>
				<textarea name="content" placeholder="content"></textarea><br>
			</center>	
				<button type="submit" name="search">Submit</button>
		</form>
		<?php } 
			mysqli_close($conn);
		?>
	</div>
</body>
</html>