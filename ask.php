<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple StackExchange: Ask a Question</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="js/validate.js"></script>

    <?php
    	ini_set('short_open_tag', 'on');
			require 'function/connect.php';
			$conn->close();
		?>

	</head>
	<body>
		<div class="container">
			<a href="home.php"><h1>Simple StackExchange</h1></a>
			<div class="content">
				<h2>What's your question?</h2>
			</div>
			
			<div class="content">
				<form method="post" action="question.php" name="savequestion" onsubmit="return (validateQuestion())">
					<input type="text" class="input-group" placeholder="Name" name="name">
					<input type="text" class="input-group" placeholder="Email" name="email">
					<input type="text" class="input-group" placeholder="Question Topic" name="topic">
					<textarea placeholder="Content" rows="5" name="content"></textarea>
					<div class="button-bottom">
						<button type="submit" name="savequestion" value="Submit">Post</button>
					</div>
				</form>

			</div>
		</div>
	</body>
</html>

