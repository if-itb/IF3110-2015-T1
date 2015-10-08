<?php

	require_once "connection.php";
	include "functions.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>StackExchange</title>

	<link href='https://fonts.googleapis.com/css?family=Titillium+Web|Source+Sans+Pro|Droid+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
	<div class="container">
		<div class="header">
			<h1>
				<a href="index.php">Simple StackExchange</a>
			</h1>
		</div>
		
		<div class="wrapper">
			<form role="form" method="post" class="search-bar">
				<input type="text" class="search-text" placeholder="Search here">
				<input type="button" value="Search" class="search-button">
			</form>

			<div class="text-center">
				<p>Cannot find what you are looking for? <a href="form-question.php">Ask here</a></p>
			</div>

			<div class="title">
				<h3>Recently Asked Question</h3>
			</div>

			<?php
				getQuestions();
			?>

			<!--
			<div class="question-wrapper">
				<div class="question-container">
					<div class="votes">
						<p>0</p>
						<p>Votes</p>
					</div>

					<div class="answers">
						<p>0</p>
						<p>Answers</p>
					</div>

					<div class="question">
						<h3>The question topic goes here</h3>
						<p>The question content goes here</p>
					</div>

					<div class="asked-by">
						<p>asked by <a href="#" class="name">name</a> | 
							<a href="#" class="edit">edit</a> | 
							<a href="#" class="delete">delete</a>
						</p>
					</div>
				</div>

				<div class="question-container">
					<div class="votes">
						<p>0</p>
						<p>Votes</p>
					</div>

					<div class="answers">
						<p>0</p>
						<p>Answers</p>
					</div>

					<div class="question">
						<h3>The question topic goes here</h3>
						<p>The question content</p>
					</div>

					<div class="asked-by">
						<p>asked by <a href="#" class="name">name</a> | 
							<a href="#" class="edit">edit</a> | 
							<a href="#" class="delete">delete</a>
						</p>
					</div>
				</div>
			</div>
			-->
		</div>
	</div>
	
</body>
</html>