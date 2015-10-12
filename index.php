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
	<script type="text/javascript" src="assets/js/validation.js"></script>
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


			<div id="list-questions">
				
				<?php foreach ($questions as $question) : ?>
				<div class="child-content">
					<div class="sidebar">
						<div id="votes"><span id="numvotes"><?php echo $question['q_vote'] ?></span><br>Votes</div>
						<div id="answers"><span id="numanswer"><?php echo $question['num_answers'] ?></span><br>Answers</div>
					</div>

					<div class="list-content">
					<div class="question-title"><a href="question-details.php?id=<?php echo $question['q_id']; ?>"><?php echo $question['q_topic'] ?></a></div>
					<div class="question-preview"><?php echo $question['q_content'] . " ..."; ?></div>
					<div class="content-footer">asked by 
						<span class="user-question">
							<?php echo $question['q_name'] ?>
						</span> | <a href="ask.php?req=edit&id=<?php echo $question['q_id']; ?>" class="edit-question">edit</a> | <a href="delete-question.php?id=<?php echo $question['q_id']; ?>" class="delete-question" onclick="return confirm('Are you sure want to delete this?')">delete</a>
					</div>
					</div>
				</div>
				<?php endforeach; ?>
			<div>


		</div>
	</div>

</body>
</html>