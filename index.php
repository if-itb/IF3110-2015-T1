<?php
	require_once "connection.php";
	include "function.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Simple StackExchange | Home</title>
	
	<link rel="stylesheet" href="assets/css/style.css">
	<script type="text/javascript" src="js/validation.js"></script>
</head>

<body>

	<div class="container">
		<div id="header">
			<h1><a href="index.php">Simple StackExchange</a></h1>
		</div>

		<!-- das searchbox -->
		<div class="main">
			<form role="form" action="" method="get" id="searchbox">
				<input type="text" id="searchbox" name="searchquery" required>
				<input type="submit" id="searchbutton" value="Search" name="search">
			</form>

			<div class="text-center">
				<p>Cannot find what you are looking for?<a href="ask-question.php">Ask here</a></p>
			</div>

			<div class="title">
				<h3>Recently Asked Question</h3>
			</div>


			<div class="wrapper" id="list-questions">
				<div class="child-content">
					<div class="sidebar">
						<div id="votes"><span id="numvotes"></span><br>Votes</div>
						<div id="answers"><span id="numanswer"></span><br>Answers</div>
					</div>

					<div class="list-content">
						<div class="question-title">
							<p>haaaai first question</p>
						</div>
						<div class="question-preview">
							<p>lalaaaaaaalakaaaaaaaaaaaaaaaaaalalaaaaaa</p>
						</div>
						<div class="content-footer">asked by 
						<span class="user-question">
						</span> | <a href="ask.php?req=edit&id=<?php echo $question['q_id']; ?>" class="edit-question">edit</a> | <a href="delete_question.php?id=<?php echo $question['q_id']; ?>" class="delete-question" onclick="return confirm('Delete this question?')">delete</a>
					</div>
					</div>
				</div>
			<div>
			

		</div>
	</div>

</body>
</html>