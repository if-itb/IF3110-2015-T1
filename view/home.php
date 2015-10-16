<!DOCTYPE html>
<html>

<head><title>Simple StackExchange</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
	<div class ='container'>
		<h1 class='center'>Simple StackExchange</h1>

		<div class='center'>
			<input type='text' class='searchbar'> <button>Search</button>
		</div>

		<p class='center'>
			Cannot find what you are looking for? <a href='../askquestion.php'>Ask here</a>
		</p>

		<h2>Recently Asked Questions</h2>

		<?php foreach($questions as $question): ?>
			<div class='question'>
			<div class='row'>
				<div class='col-1'>
					<p class='center'><b><?php echo $question["votes"]; ?></b></p>
					<p class='center'><b>Votes</b></p>
				</div>
				<div class='col-1'>
					<p class='center'><b><?php echo $question["number_of_answers"]; ?></b></p>
					<p class='center'><b>Answers</b></p>
				</div>
				<div class='col-8'>
					<p>	
						<a href='viewquestion.php?id=<?php echo $question["questionId"];?>' >
							<?php echo $question["topic"]; ?>
						</a>
					</p>
					<p class='right'>
					asked by <span class="name"><?php echo $question["asker"]; ?></span> | 
					<a href='#' onclick = "editQuestion(<?php echo $question["questionId"]; ?>)">edit</a> | 
					<a href='#' onclick = "deleteQuestion(<?php echo $question["questionId"]; ?>)" >delete</a>
					</p>
				</div>
			</div>
			</div>
		<?php endforeach; ?>
	</div>
	<script type='text/javascript' src='/assets/js/question.js'></script>
</body>
</html>