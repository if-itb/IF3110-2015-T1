<?php
	require_once("connection.php");
	include "functions.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>StackExchange</title>

	<link href='https://fonts.googleapis.com/css?family=Titillium+Web|Source+Sans+Pro|Droid+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script type="text/javascript" src="js/validation.js"></script>
</head>

<body>
	<div class="container">
		<div class="header">
			<h1>
				<a href="index.php">Simple StackExchange</a>
			</h1>
		</div>

		<div class="wrapper">
			<div class="title">
				<h2>Edit your question</h2>
			</div>

			<?php
				$row = getValueFromQuestion();
				$editURL = "edit-question.php?id=".$row['id'];
			?>
	
			<form name="question-form" role="form" method="post" action=<?php echo $editURL ?> onsubmit="return validateForms()" class="question-form">
				<!-- <input type="hidden" name="id" value=$row['id']> -->
				<input type="text" name="name" placeholder="Name" class="content-question-form" value=<?php echo $row['name'] ?> >
				<input type="text" name="email" placeholder="Email" class="content-question-form" value=<?php echo $row['email'] ?> >
				<input type="text" name="topic" placeholder="Question Topic" class="content-question-form" value=<?php echo $row['topic'] ?> >
				<textarea rows="10" name="content" cols="106" placeholder="Content" class="textarea-question-form"><?php echo $row['content'] ?> </textarea>

				<input name="post-button" type="submit" value="Post" class="post-button">
			</form>

		</div>
	</div>
</body>
</html>