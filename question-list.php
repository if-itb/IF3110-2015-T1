<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>

	<title>Stack Exchange</title>
	<link rel="StyleSheet" href="css/style.css" type="text/css">
	<script src="js/script.js"></script>

	<?php

		include 'dbfunctions.php';
		$conn = ConnectToDatabase();

		function limit_output($x, $length) {
  			if(strlen($x)<=$length) {
    			echo $x;
  			}
 			else {
    			$y=substr($x,0,$length) . '...';
    			echo $y;
  			}
		}

	?>
</head>



<body>

<div id="header">
	<h1> <a href ="question-list.php" style="color:#000"> Simple Stack Exchange </a> </h1>
</div>

<div class = "container">

	<form method="GET" action="question-list.php">
		<div>
			<input type="submit" id="search_button" id="search_button" value="Search">
			<input type="text" name="searchkey" id="searchkey">
			<p style="text-align:center"> Cannot find what you are looking for? <a href="ask-question.php" style="color:#FFA500"> Ask Here </a> </p>
		</div>
	</form>
	<h2> Recently Asked Question <hr> </h2>
	<?php
		if(isset($_GET['searchkey'])) {
			$result = SearchQuestions($_GET['searchkey']);
		}
		else {
			$result = GetAllQuestions();
		}
		$count_question = mysqli_num_rows ($result);
		if($count_question==0) {
		}
		else {
			 while($row = mysqli_fetch_assoc($result)) {
				?>
				<div class="boxarea">
					<div class="vote">
						<h3><?php echo $row["question_vote"] ?></h3>
						Votes
					</div>

					<div class="vote" style="margin-left:5%">
						<?php
							$id = $row["question_id"];
							$answer = GetAllAnswers($id);
							$count_answer = mysqli_num_rows ($answer);
						?>
						<h3><?php echo $count_answer ?></h3>
						Answers
					</div>

					<div class="question-content">
						<h4><a href="question-page.php?id=<?php echo $row['question_id']?>"> <?php echo $row["question_topic"] ?></a></h4>
						<p> <?php echo limit_output($row["question_content"], 150); ?> </p>
					</div>
					
					<div class = "edit-delete">
						<p> asked by <?php echo $row["question_name"] ?> | <a href="ask-question.php?edit=<?php echo $row['question_id']?>" style="color:#FFA500"> edit </a> | <a href="#" onclick="validateDelete(<?php echo $row['question_id'] ?>);" style="color:#FF0000"> delete </a></p>
					</div>

				</div>
				<hr>
				<?
				
			}
		}
	?>
	
</div>

</body>
</html>
