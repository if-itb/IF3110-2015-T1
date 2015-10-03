<html>
<head>
	<title>Simple StackExchange</title>
	<?php include('backend/question.php');
	include('backend/answer.php');?>
</head>
<body>
	<div class="big_title">Simple StackExchange</div><br>

	<div class="title"><?php echo $question['topic'];?></div>
	<div class="divider"><div>
	<div class="content">
		<div class="votes"></div>
		<div class=""><?php echo $question['content'];?></div>
	</div>
	<div class="details">asked by <?php echo $question['name'];?> at <?php echo $question['timestamp'];?> | <?php echo '<a href="edit.php?id='.$question['id'].'">edit</a> | <a href="javascript:confirmDelete('.$question['id'].')">delete</a>';?>

	<div class="answer">
		<div class="title"> <?php echo $question['count'];?> Answer</div>
		<?php while($row = mysqli_fetch_array($result_answer)) {?>
			<div class="content">
				<div class="votes"></div>
				<div class=""><?php echo $row['content'];?></div>
			</div>
			<div class="details">answered by <?php echo $row['name'];?> at <?php echo $row['timestamp'];?></div>
		<?php }?>
	</div>

	Your Answer
	<form method="post">
		<input type="text" name="name" placeholder="Name"><br>
		<input type="text" name="email" placeholder="Email"><br>
		<input type="text" name="content" placeholder="Content" rows="5"><br>
		<button type="submit">Post</button>
	</form>
</body>