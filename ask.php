<?php
	require_once("./includes/mysql.php");
?>

<html lang="en">
<head> 
	<meta charset="UTF-8">
	<title>Simple StackExchange </title>
	<link rel="stylesheet" type="text/css" href="css/mainstyle.css">
	<script type="text/javascript" src="js/delete.js"></script>
	<script type="text/javascript" src="js/validate.js"></script>
	<script type="text/javascript" src="js/vote.js"></script>
</head>

<body>
	<div id="wrapper">
		<h1 class = "center"> <a href="index.php"> Simple StackExchange </a>
</h1>

<?php
	$question_id = isset($_GET['question_id']) ? $_GET['question_id'] : '';
	$data = $question_id != '' ? getQuestion($question_id) : array();
	$data['name'] = !isset($data['name']) ? '' : $data['name'];
	$data['email'] = !isset($data['email']) ? '' : $data['email'];
	$data['topic'] = !isset($data['topic']) ? '' : $data['topic'];
	$data['content'] = !isset($data['content']) ? '' : $data['content'];
?>

<h2 class ="underline"> What's your question? </h2>

<form action="index.php" method="POST" class="block" onsubmit="return validateQuestionForm(this)">

<form action="index.php" method="POST" class="block">
	<input type="text" placeholder="Name" name="name" value="<?php echo $data['name'] ?>" />
	<input type="text" placeholder="Email" name="email" value="<?php echo $data['email'] ?>" />
	<input type="text" placeholder="Question Topic" name="topic" value="<?php echo $data['topic'] ?>" />
	<textarea name="content" placeholder="Content"><?php echo $data['content'] ?></textarea>
	<input type="submit" value="Post" />
	<input type="hidden" name="type" value="ask" />
	<input type="hidden" name="question_id" value="<?php echo $question_id ?>" />
</form>

	</div>
 </body>
 </html>