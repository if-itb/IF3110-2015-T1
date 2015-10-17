<!DOCTYPE html>
<head>
	<title>Simple StackExchange</title>
	<link rel="stylesheet" href="css/style.css" />
	<script src="js/validation.js"></script>
	<script src="js/delete_question.js"></script>
	<script src="js/ajax.js"></script>
	<?php include('backend/question.php');
	include('backend/answer.php');?>
</head>
<body>
	<a href="index.php"><h1>Simple StackExchange</h1></a><br>

	<div class="title"><?php echo $question['topic'];?></div>
	<hr></hr>
	<div class="question">
		<table>
			<tbody>
				<tr>
					<td>
						<a class="vote-up" href="javascript:upvoteQuestion(<?php echo $question['id'];?>)">Up</a>
						<div class="vote" id="votes"><?php echo $question['votes'];?></div>
						<a class="vote-down" href="javascript:downvoteQuestion(<?php echo $question['id'];?>)">Down</a>
					</td>
					<td>
						<div class="content"><?php echo $question['content'];?></div><br>
						<div class="credential">asked by <?php echo $question['name'];?> at <?php echo $question['timestamp'];?> | <?php echo '<a class="yellow" href="edit.php?id='.$question['id'].'">edit</a> | <a class="delete" href="javascript:confirmDelete('.$question['id'].')">delete</a>';?></div>
					</td>
				</tr>
			</tbody>
		</table>
	<br>
	<div class="answer">
		<div class="title"><div id="count"><?php echo $question['count'];?> Answer</div>
		<ul>
			<?php while($row = mysqli_fetch_array($result_answer)) {?>
				<hr></hr>
				<li>
					<table>
						<tbody>
							<tr>
								<td>
									<a class="vote-up" href="javascript:upvoteAnswer(<?php echo $row['id_answer'];?>)">Up</a>
									<div class="vote" id="votes<?php echo $row['id_answer'];?>"><?php echo $row['votes'];?></div>
									<a class="vote-down" href="javascript:downvoteAnswer(<?php echo $row['id_answer'];?>)">Down</a>
								</td>
								<td>
									<div class="content"><?php echo $row['content'];?></div>
									<div class="credential">answered by <?php echo $row['name'];?> at <?php echo $row['timestamp'];?></div>
								</td>
							</tr>
						</tbody>
					</table>
				</li><br>
			<?php }?>
		</ul>
		<div id="ajax_answer"></div>
	</div>

	<hr></hr>
	<div class="new-answer">
		<div class="title">Your Answer</div>
		<form name="answer" method="post" action="backend/add_answer.php">
			<input type="hidden" name="id" value=<?php echo $question['id'];?>>
			<input class="inputform" type="text" name="name" placeholder="Name"><br>
			<input class="inputform" type="text" name="email" placeholder="Email"><br>
			<textarea class="inputform" type="text" name="content" placeholder="Content"></textarea><br>
			<input class="button" type="submit" value="Post" onclick="return validateFormAnswer()">
		</form>
	</div>
</body>