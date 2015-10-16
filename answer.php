<?php
	include "db_connect.php";
	// Variable for DB Connection
	$servername = "localhost";
	$username = "admin";
	$password = "root";
	$dbname="stackexchange";
	$connection = new db_connect($servername, $username, $password, $dbname);
	$connection->connect();
	$connection->postQuestion($_POST["name"], $_POST["email"], $_POST["questionTopic"],$_POST["content"]);
	$connection->close_connection();
?>

<html>
	<head>
		<Title> Simple StackExchange </Title>
		<link rel="stylesheet" href="styles.css" type="text/css">
		<meta> </meta>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<h1> Simple Stack Exchange </h1>
			</div>

			<!--Question Section -->
			<div class="question">
				<div >
					<h3>Question Topic Here
						<!--<?php echo $_POST["questiontopic"]?>--></h3>
				</div>
				<!-- Question content -->
				<div>
					<!-- Vote Section -->
					<div class="vote">
						
					</div>
				</div>
				<!--Footer content -->
				<div>
					<!--<p>
					<?php echo "asked by ", $_POST["username"]," at ", getTimestamp("question", getQuestionId("question", $_POST["username"], $_POST["questiontopic"])); ?> | <a href="#" id="editPost">edit</a> | <a href="#" onclick="" id="deletePost">delete</a> </p>
				-->
				</div>
			</div>
			<!-- Answer Section -->
			<div class="answer">
				<!-- PHP here to print all the answer of the question -->
			</div>


			<div class="question">
				<form action="answer.php" method="post" name="questionForm" >
					<div class="textbox">
						<!-- Name -->
						<input type="text" name="name" placeholder="Name" size="50" onsubmit="return validateName()">
					</div>
					<div class="textbox">
						<!-- Email -->
						<input type="text" name="email" placeholder="E-mail" size="50" onsubmit="return validateEmail()">
					</div>
					<div class="textbox">
						<!-- Content -->
						<textarea type="text" name="content" placeholder="Content" cols="52" rows="7" onsubmit="return validateContent()"></textarea>
					</div>
					<div class="post-button"><input type="submit" value="Post"></div>
				</form>
			</div>
		</div>
	</body>
</html>