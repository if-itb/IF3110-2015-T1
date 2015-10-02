<html>
<head>
	<title>Simple StackExchange</title>
	<?php include('backend/question.php');?>
</head>
<body>
	<div class="big_title">Simple StackExchange</div><br>

	<div class="title"><?php echo $question['topic'];?></div>
	<div class="divider"><div>
	<div class="content">
		<div class="votes"></div>
		<div class=""><?php echo $question['content'];?></div>
	</div>
	<div class="details">asked by <?php echo $question['name'];?> at <?php echo $question['timestamp'];?> | <a>edit</a> | <a>delete</a></div>

	<div class="answer">
		<div class="title">1 Answer</div>
		<div class="content">
			<div class="votes"></div>
			<div class="">Content goes here</div>
		</div>
		<div class="details">answered by username at datetime</div>
	</div>

	Your Answer
	<form method="post">
		<input type="text" name="name" placeholder="Name"><br>
		<input type="text" name="email" placeholder="Email"><br>
		<input type="text" name="content" placeholder="Content" rows="5"><br>
		<button type="submit">Post</button>
	</form>
</body>