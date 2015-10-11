<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple StackExchange: Question</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" />

     <?php
			ini_set('short_open_tag', 'on');
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
			if (isset($_SESSION['questionid']))
					$id = $_SESSION['questionid'];

			// How to fetch from and insert into database
			if (isset($_POST['savequestion'])) { // if the previous page was the Ask a Question page
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

				$selectid = "SELECT id from question ORDER BY id DESC LIMIT 1";
				$result = $conn->query($selectid);

				if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
						$id=$row["id"];
			    }
				} else {
				    echo "0 results";
				}

			} else if (isset($_POST['editquestion'])) { // if the previous page was the Edit Question page
				$name = mysqli_real_escape_string($conn,$_POST['name']);
				$email = mysqli_real_escape_string($conn,$_POST['email']);
				$topic = mysqli_real_escape_string($conn,$_POST['topic']);
				$content = mysqli_real_escape_string($conn,$_POST['content']);

				$sql = "UPDATE question
				SET name='$name', email='$email', topic='$topic', content='$content'
				WHERE id=$id;";

				if ($conn->query($sql) === TRUE) {
			    //do nothing
				} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}

			} else if (isset($_POST['saveanswer'])) { // if the previous action was submitting answer
				$name_ans = mysqli_real_escape_string($conn,$_POST['name_ans']);
				$email_ans = mysqli_real_escape_string($conn,$_POST['email_ans']);
				$content_ans = mysqli_real_escape_string($conn,$_POST['content_ans']);

				$sql = "INSERT INTO answer (id, name_ans, email_ans, content_ans, vote_ans)
				VALUES ('$id', '$name_ans', '$email_ans', '$content_ans', 0)";

				if ($conn->query($sql) === TRUE) {
			    //do nothing
				} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}

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

			}else if (isset($_GET['id'])){ // if the previous page was the homepage
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

			// set session for question id
			if (isset($id)){
				$_SESSION['questionid']=$id;
				$edit="edit.php?id=".$id;
				$delete="delete.php?id=".$id;
			}

		?>
		
	</head>
	<body>
		<div class="container">
			<a href="home.php"><h1>Simple StackExchange</h1></a>
			<div class="content">
				<h2><?php echo $topic?></h2>
				<p><?php echo $content?></p>
				<div class="question-sign">
					<p>asked by <font color="#008080"><?php echo $name?></font> | <a class="edit" href=<?=$edit ?>>edit</a> |
						<a class="delete" href=<?=$delete ?> onClick="return confirm('Are you sure you want to delete this question?')">delete</a></p>
				</div>
			</div>
			
			<div class="content">
				<?php
					$countsql = "SELECT count(id_ans) FROM answer WHERE id=$id";
					$countans = $conn->query($countsql);

					if ($countans->num_rows > 0) {
					    // output data of each row
					    while($row = $countans->fetch_assoc()) {
					    	if ($row["count(id_ans)"]>1)
					    		echo "<h2 style=\"margin-bottom:0px;\">".$row["count(id_ans)"]." Answers</h2>";
					    	else if ($row["count(id_ans)"]==1)
					    		echo "<h2 style=\"margin-bottom:0px;\">".$row["count(id_ans)"]." Answer</h2>";
					    	else
					    		echo "<h2 style=\"margin-bottom:0px;\">No Answer</h2>";
					    }
					} else {
					    echo "0 results";
					}
				
					$listq = "SELECT id_ans, name_ans, content_ans, vote_ans FROM answer WHERE id=$id";
					$result = $conn->query($listq);

					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
								echo
								"<div class=\"answer-list\">
									<p>".$row["content_ans"]."</p>
									<div class=\"question-sign\">
										<p>answered by <font color=\"#008080\">".$row["name_ans"]."</font></p>
									</div>
								</div>
								";

					    }
					} else {
					    echo "0 results";
					}

					$conn->close();

				?>
			</div>

			<div class="content" style="margin-top:30px;">
				<div class="grey-title">Your Answer</div>
				<form method="post">
					<input type="text" class="input-group" placeholder="Name" name="name_ans">
					<input type="text" class="input-group" placeholder="Email" name="email_ans">
					<textarea placeholder="Content" rows="5" name="content_ans"></textarea>
				<div class="button-bottom">
					<button type="submit" name="saveanswer">Post</button>
				</div>
			</form>
			</div>
		</div>
	</body>
</html>