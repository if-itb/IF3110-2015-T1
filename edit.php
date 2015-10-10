<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple StackExchange: Edit Question</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <?php
    	ini_set('short_open_tag', 'on');
    	session_start();

			$servername = "localhost";
			$username = "root";
			$password = "12345";
			$db = "stackexchange";

			// Create connection
			$conn = new mysqli($servername, $username, $password,$db);
			// Check connection
			if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
			}
			
			if (isset($_GET['id'])){
				$id = (int)$_GET['id'];
				$_SESSION['questionid']=$id;
				
				$listq = "SELECT name, email, topic, content FROM question WHERE id=$id";
				$result = $conn->query($listq);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				    	$name=$row["name"];
				    	$email=$row["email"];
				    	$topic=$row["topic"];
				    	$content=$row["content"];
				    }
				} else {
				    echo "0 results";
				}
			}

			$conn->close();
		?>

	</head>
	<body>
		<div class="container">
			<a href="home.php"><h1>Simple StackExchange</h1></a>
			<div class="content">
				<h2>What's your question?</h2>
			</div>
			
			<div class="content">
				<form method="post" action="question.php">
					<input type="text" class="input-group" placeholder="Name" name="name" value="<?=$name ?>">
					<input type="text" class="input-group" placeholder="Email" name="email" value="<?=$email ?>">
					<input type="text" class="input-group" placeholder="Question Topic" name="topic" value="<?=$topic ?>">
					<textarea placeholder="Content" rows="5" name="content" resize="none"><?=$content ?></textarea>
					<div class="button-bottom">
						<button type="submit" name="editquestion">Post</button>
					</div>
				</form>

			</div>
		</div>
	</body>
</html>