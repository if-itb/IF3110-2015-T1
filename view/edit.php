<!DOCTYPE html>
<html>

<head><title>Ask question</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>


<body>
	<div class ='container'>
		<h1 class='center'>Simple StackExchange</h1>
		<div>&nbsp;</div>
		<h1>What's your question?</h1>
		<hr>

		<form name='askForm' action='tools/question/updatequestion.php' 
		  method = 'post' onsubmit="return validateAskForm()">
		  	<input type="hidden" name="questionId" value="<?php echo $question["questionId"];?>">
			<input type='text' name='asker' class='formInput' placeholder='Name' value='<?php echo $question["asker"]; ?>'>
			<input type='text' name='email' class='formInput' placeholder='Email' value='<?php echo $question["email"]; ?>'>
			<input type='text' name='topic' class='formInput' placeholder='Question Topic' value='<?php echo $question["topic"]; ?>'>
			<textarea name='content' class='formInput' placeholder='Content' rows='10'><?php echo $question["content"]; ?></textarea>
			<div class='right'><button type='submit'>Post</button></div>
		</form>
	</div>
	<script type='text/javascript' src='assets/js/validate.js'></script>
</body>
</html>