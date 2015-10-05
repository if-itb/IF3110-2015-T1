<?php

include("setup_post.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple StackExchange | Home</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
	<div id="header">
		<h1>Simple StackExchange</h1>
	</div>

	<!-- das searchbox -->
	<div class="main">
		<div class="wrapper" id="searchbox">
			<form role="form" action="" method="get">
				<input type="text" id="searchbox" name="searchquery" required>
				<input type="submit" id="searchbutton" value="Search" name="search">
			</form>

			<p>Cannot find what you are looking for? <a href="ask.php">Ask here</a></p>
		</div>
		
		<div class="wrapper" id="list-questions">
			<div class="content-header">
				<h2>Recently Asked Questions</h2>
			</div>

			<?php foreach ($questions as $question) : ?>

			<div class="child-content">
				<div class="sidebar">
					<div id="votes"><span id="numvotes"><?php echo $question['q_vote'] ?></span><br>Votes</div>
					<div id="answers"><span id="numanswer"><?php echo $question['num_answers'] ?></span><br>Answers</div>
				</div>

				<div class="list-content">
					<div id="questioncontent"><a href="thread.php?id=<?php echo $question['q_id']; ?>"><?php echo $question['q_topic'] ?></a></div>
					<div id="options">asked by 
						<span class="user-question">
							<?php echo $question['q_name'] ?>
						</span> | <a href="#" class="edit-question">edit</a> | <a href="#" class="delete-question">delete</a></div>
				</div>
			</div>

			<?php endforeach; ?>

		</div>
	</div>
</div>

<script type="text/javascript" src="js/main.js"></script>

</body>
</html>