<!DOCTYPE html>
<html>
	<head>
		<link rel = "stylesheet" href = "../css/styles.css">
	</head>
	<body>
		<div class = "middle-box">
			<h1>Simple StackExchange</h1>
			<br />
			<br />
			<form class = "middle" method = "post">
				<input id = "boxed" type = "text" name = "search">
				<input type = "submit" name = "search" value = "Search">
			</form>
			<p class = "middle">Cannot find what you are looking for? <a class = "hl-orange" href = "Question.php?edit=-1">Ask here</a></p>
			<br />
			<br />
			<h3>Recently Asked Questions</h2>
		</div>
		<?php
			require 'functions.php';

			$conn = get_connectqa();

			// Select all
			$result = mysqli_query($conn,"SELECT * FROM	questions LEFT JOIN (SELECT COUNT(answers.ID) AS Ans, Ans_ID AS Q_ID FROM questions JOIN answers WHERE questions.ID = answers.Ans_ID GROUP BY questions.ID ) AS temp ON questions.ID = temp.Q_ID ORDER BY Date DESC");

			while($row = mysqli_fetch_assoc($result)) {
				echo '<div class = "middle-box">
						<div class = "question">
							<div class = "small-box">
								<p>';
								echo $row['Votes'];
								echo '<br />
								Votes</p>
							</div>
							<div class = "small-box">
								<p>';
								echo notNULL($row['Ans']);
								echo '<br />
								Answers</p>
							</div>
							<div class = "big-box">
								<a class = "hl-black-medium" href = "Answer.php?ID=';
								echo $row['ID'];
								echo '">';
								echo $row['Topic'];
								echo '</a><br /><p class = "top-left">';
								echo substr($row['Content'], 0, 50);
								echo '</p>
							</div>
							<div>
								<p class = "right">Asked by | <span class = "hl-blue">';
								echo $row['Name'];
								echo '</span> | <a class = "hl-orange" href = "Question.php?edit=';
								echo $row['ID'];
								echo '"> edit</a> | <a class = "hl-red" href = "deleterow.php?table=questions&row=';
								echo $row['ID'];
								echo '">delete</a></p>
							</div>
						</div>
					</div>';
			}
			mysqli_close($conn);
		?>
	</body>
</html>	