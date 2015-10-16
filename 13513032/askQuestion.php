<!DOCTYPE html>

<html>
	<head>
		<title>What's your question? - Simple StackExchange</title>
		<link href="style.css" rel="stylesheet" type="text/css"></link>
	</head>

	<body>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "database032";	// Nama database

			// Membuat koneksi
			$connection = mysqli_connect($servername, $username, $password, $database);

			// Mengecek koneksi
			if (!$connection) {
			    die("Connection failed: " . mysqli_connect_error());
			}
		?>

		<h1><a href="index.php" style="color:black">Simple StackExchange</a></h1>
		<h2>What's your question?</h2>
		<p class="questionBoundary"></p>
		<p style="margin-bottom:25px"></p>

		<?php
			if (isset($_GET["id"])) {
				$action = "answerQuestion.php?id=".$_GET["id"];
				$editQuestionQuery = "	select questionname, questionemail, questiontopic, questioncontent
										from questions
										where questionid = ".$_GET["id"];
				$editQuestionResults = mysqli_query($connection, $editQuestionQuery);
				$editQuestionResult = mysqli_fetch_assoc($editQuestionResults);
				$nameValue = $editQuestionResult["questionname"];
				$emailValue = $editQuestionResult["questionemail"];
				$topicValue = $editQuestionResult["questiontopic"];
				$contentValue = $editQuestionResult["questioncontent"];
			} else {
				$action = "index.php";
				$nameValue = "";
				$emailValue = "";
				$topicValue = "";
				$contentValue = "";
			}
		?>

		<form <?php echo "action='".$action."'"; ?> method="post">
			<input class="askQuestionData" name="questionName" placeholder="Name" type="text" <?php echo "value='".$nameValue."'"; ?>></input>
			<input class="askQuestionData" name="questionEmail" placeholder="Email" type="text" <?php echo "value='".$emailValue."'"; ?>></input>
			<input class="askQuestionData" name="questionTopic" placeholder="Question Topic" type="text" <?php echo "value='".$topicValue."'"; ?>></input>
			<textarea name="questionContent" placeholder="Content" rows="9"><?php echo $contentValue; ?></textarea>
			<input id="postButton" name='questionPostButton' type="submit" value="Post"></input>
		</form>

		<?php
			mysqli_close($connection);
		?>

	</body>
</html>