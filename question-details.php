<?php
	require_once("connection.php");

	$id = $_GET['id'];
	if ($id) {
		$q_query = "SELECT * FROM question WHERE q_id=". $id .";";
		$result = mysqli_query($conn, $q_query);
		$question = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$a_query = "SELECT * FROM answer WHERE ans_q_id=". $id ." ORDER BY ans_vote DESC, ans_time;";
		$result = mysqli_query($conn, $a_query);
		$answers = array();
		if ($result) {
			while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC))
				$answers[] = $rows;
		}
	} else {
		header("Location: index.php");
		die();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Simple StackExchange | Question</title>

	<link rel="stylesheet" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/validation.js"></script>

</head>
<body>

<div class="container">
	<div id="header">
		<h1><a href="index.php">Simple StackExchange</a></h1>
	</div>

	<div class="main">

		<div class="wrapper" id="the-question">
			<div class="quest_title">
				<h2><?php echo $question['q_topic']; ?></h2>
			</div>
			<div class="child-content">
				<div class="sidebar">
					<div class="voteup" onclick="voteUpdating(<?php echo $question['q_id']; ?>, 'questions', 1)">
					</div>
					<div id="questions-vote"><?php echo $question['q_vote']; ?></div>
					<div class="votedown" onclick="voteUpdating(<?php echo $question['q_id']; ?>, 'questions', -1)">
					</div>
				</div>
				<div class="list-content">
					<div class="thread-content"><?php echo "<p>".$question['q_content']."</p>"; ?></div>
					<div class="content-footer">
						asked by <span class="user-question"><?php echo $question['q_name']; ?></span> at <?php echo $question['q_time']; ?> | <a href="ask.php?req=edit&id=<?php echo $question['q_id']; ?>" class="edit-question">edit</a> | <a href="delete-question.php?id=<?php echo $question['q_id']; ?>" class="delete-question" onclick="return confirm('Are you sure want to delete this?')">delete</a></div>
				</div>
			</div>	
		</div>
		
		<div class="wrapper" id="the-answers">
			<div class="quest_title">
				<h2><?php echo count($answers); ?> Answers</h2>
			</div>

			<?php foreach ($answers as $answer) : ?>

			<div class="child-content">
				<div class="sidebar">
					<div class="voteup" onclick="voteUpdating(<?php echo $answer['ans_id']; ?>, 'answers', 1)">
					</div>
					<div id="answers-vote-<?php echo $answer['ans_id']; ?>"><?php echo $answer['ans_vote']; ?></div>
					<div class="votedown" onclick="voteUpdating(<?php echo $answer['ans_id']; ?>, 'answers', -1)">
					</div>
				</div>
				<div class="list-content">
					<div class="thread-content"><?php echo "<p>".$answer['ans_content']."</p>"; ?></div>
					<div class="content-footer">
						answered by <span class="user-question"><?php echo $answer['ans_name']; ?></span> at <?php echo $answer['ans_time']; ?>
					</div>
				</div>
			</div>

			<?php endforeach; ?>
		</div>

		<div class="wrapper" id="answer-form">
			<div class="child-content">
				<div class="content-header">
					<h2>Your Answer</h2>
				</div>
				<form role="form" onsubmit="return validateAnswerForm()" action="add-answer.php" method="post" id="the-form">
					<input type="hidden" name="qid" value="<?php echo $question['q_id']; ?>">
					<input type="text" name="name" placeholder="Name" id="name"><br>
					<input type="email" name="email" placeholder="Email" id="email"><br>
					<textarea name="content" form="the-form" placeholder="Content" id="content"></textarea><br>
					<input type="submit" value="Post" name="post" id="post">
				</form>
			</div>
		</div>

	</div>
	
</div>

</body>
</html>