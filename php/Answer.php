<!DOCTYPE html>
<html>
	<head>
		<link rel = "stylesheet" href = "../css/styles.css">
		<script src = "../js/functions.js"></script>
	</head>
	<body>
		<div class = "middle-box">
			<h1>Simple StackExchange</h1>
			<?php
				require 'functions.php';

				$ID = $_GET['ID'];
				
				$conn = get_connectqa();

				// Select with ID
				$result = mysqli_query($conn, "SELECT * FROM questions LEFT JOIN (SELECT COUNT(answers.ID) AS Ans, Ans_ID AS Q_ID FROM questions JOIN answers WHERE questions.ID = answers.Ans_ID GROUP BY questions.ID ) AS temp ON questions.ID = temp.Q_ID WHERE ID=".$ID);
				$row = mysqli_fetch_assoc($result);
					echo '<h2>';
						echo $row['Topic'];
						echo '</h2>
						<div class = "question">
							<div class = "small-box">
								<div class = "middle" id = "votes"><span id = "questions';
									echo $ID;
									echo '">';
									echo $row['Votes'];
								echo '</span></div><p>
								<img class = "small-button" src="../img/unlike.jpg" alt="Unlike" onclick = \'like("questions",'.$ID.',-1)\'>
								&nbsp;
								<img class = "small-button" src="../img/like.jpg" alt="Like" onclick = \'like("questions",'.$ID.',1)\'></p>
							</div>
							<div class = "big-box">';
								echo $row['Content'];
								echo '
							</div>
							<div>
								<p class = "right">asked by ';
								echo $row['Name'];
								echo ' ';
								echo $row['Email'];
								echo ' at ';
								echo $row['Date'];
								echo '<a class = "hl-orange" href = "Question.php?edit=';
								echo $row['ID'];
								echo '"> edit</a> | <a class = "hl-red" href = "deleterow.php?table=questions&row=';
								echo $row['ID'];
								echo '">delete</a></p>
							</div>
						</div>
						<h2>';
						echo notNULL($row['Ans']);
						echo ' Answer(s)</h2>';
						$result = mysqli_query($conn, "SELECT * FROM answers WHERE answers.Ans_ID = ".$ID." ORDER BY Date ASC");
						while($row = mysqli_fetch_assoc($result)) {
							echo '<div class = "question">
								<div class = "small-box">
									<div class = "middle" id = "votes"><span id = "answers';
										echo $row['ID'];
										echo '">';
										echo $row['Votes'];
									echo '</span></div><p>
									<img class = "small-button" src="../img/unlike.jpg" alt="Unlike" onclick = \'like("answers",'.$row['ID'].',-1)\'>
									&nbsp;
									<img class = "small-button" src="../img/like.jpg" alt="Like" onclick = \'like("answers",'.$row['ID'].',1)\'></p>
								</div>
								<div class = "big-box">';
									echo $row['Content'];
									echo '
								</div>
								<div>
									<p class = "right">answered by ';
									echo $row['Name'];
									echo ' ';
									echo $row['Email'];
									echo ' at ';
									echo $row['Date'];
									echo '</p>
								</div>
							</div>';
						};
			?>
			<div class = "question"></div>
			<h4>Your Answer</h4>
			<form name = "answers" method = "post" onsubmit = "return aformValidation()">
				<input type = "text" class = "full-form" placeholder = "Name" name = "name">
				<br />
				<input type = "text" class = "full-form" placeholder = "Email" name = "email">
				<br />
				<textarea class = "full-form" placeholder = "Content" name = "content" rows = "7" cols = "80"></textarea>
				<br />
				<input type = "submit" class = "post-button" name = "post" value = "Post">
			</form>
			<p id = "success"></p>
		</div>

		<?php
			if(isset($_POST['post'])) {
				$name = $_POST['name'];
				$email = $_POST['email'];
				$content = $_POST['content'];

				$result = mysqli_query($conn, "INSERT INTO answers(Name, Email, Content, Ans_ID) VALUES ('$name', '$email', '$content', '$ID')");
				mysqli_close($conn);
			} else
			mysqli_close($conn);
		?>
	</body>
</html>