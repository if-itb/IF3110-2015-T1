<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/question.css">
	<script src="validator.js"></script>
	<title>Question</title>
</head>
<body>
	<div id="main">
		<h1 id="MainTitle">Simple Stack Exchange</h1>
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
				while($row=mysqli_fetch_row($query_result)){
					echo	'<div id="question">
								<h2 id="topic">'.$row[3].'</h2>
								<hr>
								<pre id="content">'.$row[4].'</pre><br>
								<div id="EmailContainer">
									<a href="delete.php?id='.$row[0].'" id="delete" onclick="return confirmDelete()">delete</a>
									<div class="char">|</div> <a href="edit.php?id='.$row[0].'" id="edit">edit</a>
									<div class="char">|</div> <div id="email">'.$row[2].'</div>
									<div id="askedby">asked by</div>
								</div>
							</div>';
				}
				
				
				//retrieve answers
				$query = "SELECT content, email, votes FROM answer WHERE question_id='".$question_id."'";
				$query_result = mysqli_query($link, $query);
				$num_answer = mysqli_num_rows($query_result);
				echo '<h2 id="NumAnswer">'.$num_answer.' Answer</h2><hr>';
				while($row = mysqli_fetch_row($query_result)){
					echo	'<div id="answer">
								<pre id="content">'.$row[0].'</pre><br>
								<div id="EmailContainer">
									<div id="email">'.$row[1].'</div>
									<div id="answeredby">answered by</div><br>
								</div>
							</div>
							<hr id="separator">';
				}
			}
			mysqli_close($link);
			// answer form
			echo	'<h2 id="AnswerFormTitle">Your Answer </h2>
					<form name="AnswerForm" action="answerQuestion.php" onsubmit="return validateAnswer()" method="post">
						<input type="hidden" name="QID" value="'.$question_id.'">
						<input id="AnswerName" type="text" name="Name" placeholder="Name"> <br>
						<input id="AnswerEmail" type="text" name="Email" placeholder="Email"> <br>
						<textarea id="AnswerContent" type="text" name="Content" placeholder="Content"></textarea> <br>
						<input id="AnswerPost" type="submit" value="Post" >
					</form>';
		?>
		
	</div>
	<br>
</body>
</html>