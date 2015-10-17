<!DOCTYPE html>
<head>
	<title>Simple StackExchange</title>
	<link rel="stylesheet" href="css/style.css" />
	<script src="js/validation.js"></script>
	<?php include('backend/question.php');?>
</head>
<body>
	<a href="index.php"><h1>Simple StackExchange</h1></a><br>

	<div class="list">
	<div class="title">Edit your question</div>
	<hr></hr>
	<form name="edit" method="post" action="backend/update.php">
		<input type="hidden" name="id" value=<?php echo $question['id']?>><br>
		<input class="inputform" type="text" name="topic" placeholder="Question Topic" value="<?php echo $question['topic']?>"><br>
		<textarea class="inputform" name="content" placeholder="Content" value="<?php echo $question['content']?>"></textarea><br>
		<input type="submit" class="button" value="Update" onclick="return validateFormEdit()">
	</form>
	</div>
</body>