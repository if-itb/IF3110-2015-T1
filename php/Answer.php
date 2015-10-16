<!DOCTYPE html>
<html>
	<head>
		<link rel = "stylesheet" href = "../css/styles.css">
		<script src = "../js/functions.js"></script>
	</head>
	<body>
		<div class = "middle-box">
			<a href = "Home.php" class = "hl-black"><h1>Simple StackExchange</h1></a>
			<?php
				require 'functions.php';

				$ID = $_GET['ID'];

				$conn = get_connectqa();
				
				printQAList($ID);
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
		</div>

		<?php
			
			if(isset($_POST['post'])) {
				$name = $_POST['name'];
				$email = $_POST['email'];
				$content = $_POST['content'];

				$result = mysqli_query($conn, "INSERT INTO answers(Name, Email, Content, Ans_ID) VALUES ('$name', '$email', '$content', '$ID')");
				mysqli_close($conn);
				//header('Location: Answer.php?ID='.$ID);
			}
		?>
	</body>
</html>