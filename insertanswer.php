
        <?php
			require_once('dbconnect.php');
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// collect value of input field
				$qid = $_POST['qid'];
				$name = $_POST['name'];
				$email = $_POST['email'];
				$content = $_POST['content'];
				var_dump($qid);
				var_dump($name);
				var_dump($email);
				var_dump($content);
				$sql = "INSERT INTO answers(name,email,qid,a_content) VALUES ('$name','$email','$qid','$content')";
				$conn->query($sql);
				$conn->close();
			}
			header("Location: question.php?id=$qid"); 
			exit;
		?>
