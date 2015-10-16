<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/ask.css">
	<script src="stack_exchange.js"></script>
	<title >Ask A Question</title>
</head>
<body>
		<h1 id="MainTitle">Simple StackExchange</h1>
	<div id="MainDiv">	
		<h3 id="SubTitle">What's your question?</h3>
		<hr>
		<?php
			$question_id = $_GET["id"];
			$link = mysqli_connect("localhost","root","","stack_exchange");
	
			if(!$link){
				die("Error: Unable to connect to database\n");
			}
			else{
				//retrieve question
				$query = "SELECT * FROM question WHERE question_id='".$question_id."'";
				$query_result = mysqli_query($link,$query);
				$row = mysqli_fetch_row($query_result);
				echo	'<form name="AskForm" action="editQuestion.php" onsubmit="return validateQuestion()" method="post">
							<input type="hidden" name="QID" value="'.$row[0].'">
							<input id="name" type="text" name="Name" placeholder="Name" value="'.$row[1].'"> <br>
							<input id="email" type="text" name="Email" placeholder="Email" value="'.$row[2].'"> <br>
							<input id="topic" type="text" name="QuestionTopic" placeholder="Question Topic" value="'.$row[3].'"> <br>
							<textarea id="content" type="text" name="Content" placeholder="Content" >'.$row[4].'</textarea> <br>
							<input id="post" type="submit" value="Post"  >
						</form>';
			}
		?>
	</div>
	
</body>
</html>