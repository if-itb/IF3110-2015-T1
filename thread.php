<?php

include("init_thread.php")

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

		<div class="wrapper" id="the-question">
			<div class="content-header">
				<h2><?php echo $question['q_topic']; ?></h2>
			</div>
			<div class="child-content">
				<div class="sidebar">
					<div class="voteup" onclick="voteQuestion(<?php echo $question['q_id']; ?>, 1)">
					</div>
					<div id="questions-vote"><?php echo $question['q_vote']; ?></div>
					<div class="votedown" onclick="voteQuestion(<?php echo $question['q_id']; ?>, -1)">
					</div>
				</div>
				<div class="list-content">
					<div class="thread-content"><?php echo "<p>".$question['q_content']."</p>"; ?></div>
					<div class="content-footer">
						asked by <span class="user-question"><?php echo $question['q_name']." (".$question['q_email'].")"; ?></span> at <?php echo $question['q_datetime']; ?> | <a href="ask.php?req=edit&id=<?php echo $question['q_id']; ?>" class="edit-question">edit</a> | <a href="delete_question.php?id=<?php echo $question['q_id']; ?>" class="delete-question" onclick="return confirm('Delete this question?')">delete</a></div>
				</div>
			</div>	
		</div>
		
		<div class="wrapper" id="the-answers">
			<div class="content-header">
				<h2><?php echo count($answers); ?> Answers</h2>
			</div>

			<?php foreach ($answers as $answer) : ?>

			<div class="child-content">
				<div class="sidebar">
					<div class="voteup" onclick="getVote(<?php echo $answer['a_id']; ?>, 'answers', 1)">
					</div>
					<div id="answers-vote-<?php echo $answer['a_id']; ?>"><?php echo $answer['a_vote']; ?></div>
					<div class="votedown" onclick="getVote(<?php echo $answer['a_id']; ?>, 'answers', -1)">
					</div>
				</div>
				<div class="list-content">
					<div class="thread-content"><?php echo "<p>".$answer['a_content']."</p>"; ?></div>
					<div class="content-footer">
						answered by <span class="user-question"><?php echo $answer['a_name']; ?></span> at <?php echo $answer['a_datetime']; ?>
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
				<form role="form" onsubmit="return validateAnswerForm()" action="add_answer.php" method="post" id="the-form">
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

<script type="text/javascript">
	function voteQuestion(id, value) {
	  	if (id == "" || value == null) {
	        return;
	    } else { 
	        if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }

	        xmlhttp.onreadystatechange = function() {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                document.getElementById("questions-vote").innerHTML = parseInt(document.getElementById("questions-vote").innerHTML) + value;
	            }
	        }

	        xmlhttp.open("GET","vote.php?id="+id+"&value="+value,true);
	        xmlhttp.send();
	    }
	}
</script>

</body>
</html>