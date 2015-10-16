<!DOCTYPE html>
<html>
	<head>
		<link rel = "stylesheet" href = "../css/styles.css">
		<script src = "../js/functions.js"></script>
	</head>
	<body>
		<div name = "questions" class = "middle-box">
			<a href = "Home.php" class = "hl-black"><h1>Simple StackExchange</h1></a>
			<h2 id = "lined-under">What's your question?</h2>
			<?php
				require 'functions.php';

				// Create connection
				$conn = get_connectqa();

				$edit = $_GET['edit'];

				printQForm($edit);

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
		</div>
	</body>
</html>