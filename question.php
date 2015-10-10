<!DOCTYPE html>
<head>
	<title>Simple StackExchange</title>
	<script src="js/delete_question.js"></script>
	<script src="js/ajax.js"></script>
	<?php include('backend/question.php');
	include('backend/answer.php');?>
</head>
<body>
	<div class="big_title">Simple StackExchange</div><br>

	<div class="title"><?php echo $question['topic'];?></div>
	<div class="divider"></div>
	<div class="content">
		<div class="votes">
			<a href="javascript:upvoteQuestion(<?php echo $question['id'];?>)">Up</a>
			<div class="votes" id="votes"><?php echo $question['votes'];?></div>
			<a href="javascript:downvoteQuestion(<?php echo $question['id'];?>)">Down</a>
		</div>
		<div class=""><?php echo $question['content'];?></div>
	</div>
	<div class="details">asked by <?php echo $question['name'];?> at <?php echo $question['timestamp'];?> | <?php echo '<a href="edit.php?id='.$question['id'].'">edit</a> | <a href="javascript:confirmDelete('.$question['id'].')">delete</a>';?></div>

	<div class="answer">
		<div class="title"><div id="count"><?php echo $question['count']." Answer";?></div></div>
		<?php while($row = mysqli_fetch_array($result_answer)) {?>
			<div class="divider"></div>
			<div class="answer">
				<div class="content">
					<a href="javascript:upvoteAnswer(<?php echo $row['id_answer'];?>)">Up</a>
					<div class="votes" id="votes<?php echo $row['id_answer'];?>"><?php echo $row['votes'];?></div>
					<a href="javascript:downvoteAnswer(<?php echo $row['id_answer'];?>)">Down</a>
					<div class=""><?php echo $row['content'];?></div>
				</div>
				<div class="details">answered by <?php echo $row['name'];?> at <?php echo $row['timestamp'];?></div>
			</div>
		<?php }?>
		<div id="ajax_answer"></div>
	</div>

	Your Answer
	<form method="post">
		<input type="text" id="name" placeholder="Name"><br>
		<input type="text" id="email" placeholder="Email"><br>
		<input type="text" id="content" placeholder="Content" rows="5"><br>
		<input type="button" name="submit" value="Post" class="submit-button" onclick="showComment(<?php echo $question['id'];?>)">
	</form>
</body>