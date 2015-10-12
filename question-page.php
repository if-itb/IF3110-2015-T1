<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	
	<title>Stack Exchange</title>
	<link rel="StyleSheet" href="css/style.css" type="text/css">
	<script src="js/script.js"></script>

	<?php

		$id = $_GET["id"];
		$id = (int) $id;
		include 'dbfunctions.php';
		$conn=ConnectToDatabase();
		$question = GetQuestion($id);
		$answer_result = GetAllAnswers($id);
		$count_answer = mysqli_num_rows ($answer_result);
    		
		?>

	

</head>



<body>

<div id="header">
	<h1> Simple Stack Exchange </h1>
</div>

<div class = "container">
	<div class="boxarea">
		<h2> <?php echo $question["question_topic"] ?> <hr> </h2>
	
		<div class="vote">
			<div class="arrow-up"></div>
			<h3 style="padding-left:50%;">0</h3>
			<div class="arrow-down"></div>
		</div>
		<p> <?php echo $question["question_content"] ?> </p>
		<p style="float:right"> asked by <?php echo $question["question_email"] ?> at <?php echo $question["question_date"] ?> | <a href="" style="color:#FFA500"> edit </a> | <a href="" style="color:#FF0000"> delete </a> </p>
	</div>

	<?php
		if($count_answer==0) {
			echo '<div class="boxarea"> <h2> 0 Answers <hr> </h2> </div>';
		}
		else {
			 echo '<h2>'; 
			 echo $count_answer; 
			 echo' Answers <hr> </h2>';
			 while($row = mysqli_fetch_assoc($answer_result)) {
			?>
				<div class="boxarea">
					
	
					<div class="vote">
						<div class="arrow-up"></div>
						<h3> <?php echo $row["answer_vote"] ?> </h3>
						<div class="arrow-down"></div>
					</div>
					<p> <?php echo $row["answer_content"]  ?> </p>
					<p style="float:right"> answer by <?php echo $row["answer_email"] ?> at <?php echo $row["answer_date"] ?> | <a href="" style="color:#FFA500"> edit </a> | <a href="" style="color:#FF0000"> delete </a> </p>
				</div>
				<br><hr>
				<?php
			}
		}
	?>

	<br>

	<h3> Your Answer </h3>
	<form method="POST" name="Form" action="add-answer.php?id=<?php echo $id ?>" onsubmit="return validateFormAnswer()">
		<input type="text" name="answer_name" id="answer_name" placeholder="Name">
		<br>
		<input type="text" name="answer_email" id="answer_email" placeholder="Email">
		<br> 
		<textarea name="answer_content" id="answer_content" rows="15" placeholder="Content"></textarea>
		<br>
		<input type="submit" id="submit_answer" name="submit_answer" value="Post">
	</form>

</div>

</body>
</html>
