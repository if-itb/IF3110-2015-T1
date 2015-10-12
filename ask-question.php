<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>

	<title>Stack Exchange</title>
	<link rel="StyleSheet" href="css/style.css" type="text/css">
	<script src="js/script.js"></script>

	<?php
		include 'dbfunctions.php';
		$conn = ConnectToDatabase();

		
	?>

</head>



<body>

<div id="header">
	<h1> Simple Stack Exchange </h1>
</div>
<?php 
if(!isset($_GET['edit'])) {
	?>
	<div class = "container">
		<h2> What's Your Question? <hr> </h2>
		<form method="POST" name="Form" action="add-question.php" onsubmit="return validateFormQuestion()">
			<input type="text" name="question_name" id="question_name" placeholder="Name">
			<br>
			<input type="text" name="question_email" id="question_email" placeholder="Email">
			<br> 
			<input type="text" name="question_topic" id="question_topic" placeholder="Question Topic">
			<br>
			<textarea name="question_content" id="question_content" rows="15" placeholder="Content"></textarea>
			<br>
			<input type="submit" id="submit_question" name="submit_question" value="Post">
		</form>
	</div>
<?php
}
else {
	$edit = $_GET['edit'];
	$question = GetQuestion($edit);
	?>
	<div class = "container">
		<h2> What's Your Question? <hr> </h2>
		<form method="POST" name="Form" action="edit-question.php?id=<?php echo $edit ?>" onsubmit="return validateFormQuestion()">
			<input type="text" name="question_name" id="question_name" placeholder="Name" value="<?php echo $question['question_name'] ?>">
			<br>
			<input type="text" name="question_email" id="question_email" placeholder="Email" value="<?php echo $question['question_email'] ?>">
			<br> 
			<input type="text" name="question_topic" id="question_topic" placeholder="Question Topic" value="<?php echo $question['question_topic'] ?>">
			<br>
			<textarea name="question_content" id="question_content" rows="15" placeholder="Content"><?php echo $question['question_content'] ?></textarea>
			<br>
			<input type="submit" id="edit_question" name="edit_question" value="Post">
		</form>
	</div>
<?php
}
?>


</body>
</html>
