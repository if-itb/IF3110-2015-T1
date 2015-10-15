<!DOCTYPE html>
<html>
	<head>
		<link rel = "stylesheet" href = "../css/styles.css">
	</head>
	<body>
		<div class = "middle-box">
			<h1>Simple StackExchange</h1>
			<h2 id = "lined-under">What's your question?</h2>
			<form method = "post">
				<input type = "text" class = "full-form" placeholder = "Name" name = "name">
				<br>
				<input type = "text" class = "full-form"placeholder = "Email" name = "email">
				<br>
				<input type = "text" class = "full-form"placeholder = "Question Topic" name = "qtopic">
				<br>
				<textarea class = "full-form" placeholder = "Content" name = "content" rows = "7"></textarea>
				<br>
				<input type = "submit" class = "post-button" name = "post" value = "Post">
			</form>
			<?php
				require 'functions.php';

				// Create connection
				$conn = get_connectqa();

				$edit = $_GET['edit'];

				if(isset($_POST['post'])) {
					$name = $_POST['name'];
					$email = $_POST['email'];
					$qtopic = $_POST['qtopic'];
					$content = $_POST['content'];
					if($edit == -1){
						$result = mysqli_query($conn, "INSERT INTO questions(Name, Email, Topic, Content) VALUES ('$name', '$email', '$qtopic', '$content')");
					} else {
						$result = mysqli_query($conn, "UPDATE questions SET Name = '$name', Email = '$email', Topic = '$qtopic', Content = '$content' WHERE ID = '$edit'");
					}
					mysqli_close($conn);
					header('Location: Home.php');
				}
				mysqli_close($conn);
			?>
			<p id = "success"></p>
		</div>
	</body>
</html>