<?php
	include("edit_question.php");
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
		<a href="index.php"><h1>Simple StackExchange</h1></a>
	</div>

	<div class="main">
		<div class="wrapper" id="question-form">
			<div class="content-header">
				<h2>What's your question?</h2>
			</div>
			<div class="child-content">
				<form role="form" onsubmit="return validateQuestionForm()" action="add_question.php?target=<?php echo $target; ?>" method="post" id="the-form">
					<?php if ($target == 'update') : ?>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
					<?php endif; ?>
					
					<input type="text" name="name" placeholder="Name" id="name" value="<?php echo $name; ?>" autofocus><br>
					<input type="email" name="email" placeholder="Email" id="email" value="<?php echo $email; ?>"><br>
					<input type="text" name="topic" placeholder="Question Topic" id="topic" value="<?php echo $topic; ?>"><br>
					<textarea name="content" form="the-form" placeholder="Content" id="content"><?php echo $content; ?></textarea><br>
					<input type="submit" value="Post" name="post" id="post">
				</form>
			</div>
		</div>
	</div>
	
</div>

<script type="text/javascript" src="js/main.js"></script>

</body>
</html>