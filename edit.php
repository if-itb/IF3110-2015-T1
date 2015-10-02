<html>
<head>
	<title>Simple StackExchange</title>
	<?php include('backend/question.php');?>
</head>
<body>
	<div class="big_title">Simple StackExchange</div><br>
	Edit your question
	<form method="post" action="add.php">
		<input type="text" name="topic" value="<?php echo $question['topic']?>"><br>
		<input type="text" name="content" value="<?php echo $question['content']?>" rows="5"><br>
		<button type="submit">Update</button>
	</form>
</body>