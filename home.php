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

		$sql = "SELECT * FROM Question";
		$result = mysqli_query($conn, $sql);	
		$count_question = mysqli_num_rows ($result);

	?>
</head>



<body>

<div id="header">
	<h1> Simple Stack Exchange </h1>
</div>

<div class = "container">
	<h2> What's Your Question? <hr> </h2>
	<form method="POST" action="home.php">
		<div>
			<input type="submit" id="search_button" value="Search">
			<input type="text" name="search" id="search">
			<p style="text-align:center"> Cannot find what you are looking for? <a href="" style="color:#FFA500"> Ask Here </a> </p>
		</div>
	</form>
	<h2> Recently Asked Question <hr> </h2>
	<?php
		if($count_question==0) {
		}
		else {
			$count = $count_question;
			 while($row = mysqli_fetch_assoc($result)) {
				?>
				<div class="boxarea">
					<div class="vote">
						<div class="arrow-up"></div>
						<h3><?php echo $row["question_vote"] ?></h3>
						<div class="arrow-down"></div>
					</div>
					<p><?php echo $row["question_topic"] ?></p>
					<p style="float:right"> asked by <?php echo $row["question_email"] ?> at datetime | <a href="" style="color:#FFA500"> edit </a> | <a href="" style="color:#FF0000"> delete </a> </p>
				</div>
				<br>
				<?
				$count--;
			}
		}
	?>
	
</div>

</body>
</html>
