<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	
	<title>Stack Exchange</title>
	<link rel="StyleSheet" href="css/style.css" type="text/css">

	<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "stackexchange";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		
		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}

		session_start();
        ini_set('max_execution_time', 600);
        if (!isset($_POST['name']) && !isset($_POST['email']) && !isset($_POST['topic']) && !isset($_POST['content'])) {
        	$name = $_SESSION['name'];
    		$email = $_SESSION['email'];
    		$topic = $_SESSION['topic'];
    		$content = $_SESSION['content'];
    		
		} else {	
    		$name = $_POST["name"]; $_SESSION['name'] = $name;
			$email = $_POST["email"]; $_SESSION['email'] = $email;
			$topic = $_POST["topic"]; $_SESSION['topic'] = $topic;
			$content = $_POST["content"]; $_SESSION['content'] = $content;
			$name_temp = "\"" . $name . "\"";
			$email_temp = "\"" . $email . "\"";
			$topic_temp = "\"" . $topic . "\"";
			$content_temp = "\"" . $content . "\"";
			$sql = "INSERT INTO Question (question_name, question_email, question_topic, question_content, question_vote)
			VALUES ($name_temp, $email_temp, $topic_temp, $content_temp, 0)";

			if (!mysqli_query($conn, $sql)) {
    			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			$last_id = mysqli_insert_id($conn);		
		}

		$sql = "SELECT answer_id FROM Question INNER JOIN Answer ON Question.question_id=Answer.question_id";
		$result = mysqli_query($conn, $sql);	
		$count_answer = mysqli_num_rows ($result);

	?>

</head>



<body>

<div id="header">
	<h1> Simple Stack Exchange </h1>
</div>

<div class = "container">
	<div class="boxarea">
		<h2> <?php echo $topic ?> <hr> </h2>
	
		<div class="vote">
			<div class="arrow-up"></div>
			<h3 style="padding-left:50%;">5</h3>
			<div class="arrow-down"></div>
		</div>
		<p> <?php echo $content ?> </p>
		<p style="float:right"> asked by <?php echo $email ?> at datetime | <a href="" style="color:#FFA500"> edit </a> | <a href="" style="color:#FF0000"> delete </a> </p>
	</div>

	<?php
		if($count_answer==0) {
			echo '<div class="boxarea"> <h2> 0 Answers <hr> </h2> </div>';
		}
		else {
			?>
			<div class="boxarea">
				<h2> Answers <hr> </h2>
	
				<div class="vote">
					<div class="arrow-up"></div>
					<h3>5</h3>
					<div class="arrow-down"></div>
				</div>
				<p> <?php echo $content ?> </p>
				<p style="float:right"> asked by <?php echo $email ?> at datetime | <a href="" style="color:#FFA500"> edit </a> | <a href="" style="color:#FF0000"> delete </a> </p>
			</div>
			<?php
		}
	?>
	<h3> Your Answer </h3>
	<form method="POST" action="answerpage.php">
		<input type="text" name="answer_name" id="answer_name" placeholder="Name">
		<br>
		<input type="text" name="answer_email" id="answer_email" placeholder="Email">
		<br> 
		<textarea name="answer_content" id="answer_content" rows="15" placeholder="Content"></textarea>
		<br>
		<input type="submit" id="submit_answer" value="Post">
	</form>


</div>

</body>
</html>
