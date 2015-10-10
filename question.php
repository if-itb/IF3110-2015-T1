<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple StackExchange: Question</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" />

     <?php
			$servername = "localhost";
			$username = "root";
			$password = "12345";
			$db = "stackexchange";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $db);
			// Check connection
			if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
			}

			session_start();
			$qid = $_SESSION['questionid'];

			if (isset($_POST['savequestion'])) { 
				$name = mysqli_real_escape_string($conn,$_POST['name']);
				$email = mysqli_real_escape_string($conn,$_POST['email']);
				$topic = mysqli_real_escape_string($conn,$_POST['topic']);
				$content = mysqli_real_escape_string($conn,$_POST['content']);

				$sql = "INSERT INTO question (name, email, topic, content,vote)
				VALUES ('$name', '$email', '$topic', '$content', 0)";

				if ($conn->query($sql) === TRUE) {
			    //do nothing
				} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}

			} else if (isset($_POST['editquestion'])) { 
				$name = mysqli_real_escape_string($conn,$_POST['name']);
				$email = mysqli_real_escape_string($conn,$_POST['email']);
				$topic = mysqli_real_escape_string($conn,$_POST['topic']);
				$content = mysqli_real_escape_string($conn,$_POST['content']);

				$sql = "UPDATE question
				SET name='$name', email='$email', topic='$topic', content='$content'
				WHERE id=$qid;";

				if ($conn->query($sql) === TRUE) {
			    //do nothing
				} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}

			} else if (isset($_GET['id'])){
				$id = (int)$_GET['id'];

				$listq = "SELECT name, email, topic, content, vote FROM question WHERE id=$id";
				$result = $conn->query($listq);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				    	$name=$row["name"];
				    	$email=$row["email"];
				    	$topic=$row["topic"];
				    	$content=$row["content"];
				    	$vote=$row["vote"];
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
				<h2><?php echo $topic?></h2>
				<p><?php echo $content?></p>
				<div class="question-sign">
					<p>asked by <?php echo $name?> | edit | delete</p>
				</div>
			</div>
			
			<div class="content">
				<h2>Answer</h2>
			</div>

			<div class="content">
				<div class="grey-title">Your Answer</div>
				<form>
					<input type="text" class="input-group" placeholder="Name">
					<input type="text" class="input-group" placeholder="Email">
					<input type="text" class="input-group" placeholder="Question Topic">
					<textarea placeholder="Content" rows="5"></textarea>
				<div class="button-bottom">
					<button type="submit">Post</button>
				</div>
			</form>
			</div>
		</div>
	</body>
</html>