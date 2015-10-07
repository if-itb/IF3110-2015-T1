<?php
	require_once("database.php");
	$question_id = isset($_GET['question_id']) ? $_GET['question_id'] : '';

	$data = $question_id != '' ? getQuestion($question_id) : array();
	$data['name'] = !isset($data['name']) ? '' : $data['name'];
	$data['email'] = !isset($data['email']) ? '' : $data['email'];
	$data['title'] = !isset($data['title']) ? '' : $data['title'];
	$data['content'] = !isset($data['content']) ? '' : $data['content'];
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Simple StackExchange</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="container">
			<h1 class="center">Simple StackExchange</h1>
	
			<h2 class="underline">What's your question?</h2>

			<form action="home.php" method="POST">
				<input id ="Name" type="text" class="form" placeholder="Name" name="name" value="<?php echo $data['name'] ?>" >				
				<input id ="Email" type="text" class="form" placeholder="Email" name="email" value="<?php echo $data['email'] ?>" >
				<input id="QTopic" type="text" class="form" placeholder="Question Topic" name="title" value="<?php echo $data['title'] ?>"" >
				<textarea id="contentInput" class="form" placeholder="Content" rows="5" name="content"><?php echo $data['content'] ?></textarea>
				<input type="hidden" name="question_id" value="<?php echo $question_id ?>">
				<input type="hidden" name="type" value="ask">
				<div class="right">
					<input type="submit" value="Post">
				</div>
			</form>
	
		</div>

	</body>
</html>