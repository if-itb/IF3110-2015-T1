<!DOCTYPE html>
<html>
<head>
	<title>Answer a Question</title>
	<link rel='stylesheet' type="text/css" href="css/sst.css">
</head>

<body>
	<h1 align="center"> Simple StackExchange</h1>
	<br>
	<br>
	<?php
		$question_id = intval($_GET['question_id']);
		$conn = mysql_connect('localhost', 'root', '08161955342');
		mysql_select_db('simplestackexchange', $conn);
		$sql = "SELECT * FROM question WHERE id=$question_id";
		$question = mysql_fetch_assoc(mysql_query($sql));
	?>
	<h3><?php echo $question['topic']; ?></h3>
	<hr>

	<script type="text/javascript">
	    function vote(id,type,result) {
	        var xhttp = new XMLHttpRequest();
	        xhttp.onreadystatechange = function() {
	            if (xhttp.readyState == 4 && xhttp.status == 200) {
					if(type == 'question')
						document.getElementById("questionvote").innerHTML = xhttp.responseText;
					else
						document.getElementById("answervote"+id).innerHTML = xhttp.responseText;
	            }
	        }
	        xhttp.open("POST", "./ajax/vote.php", true);
	        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
	        xhttp.send("action=" +result+ "&id=" + id + "&type=" + type);
	    }
	</script>

	<script type="text/javascript">
		function confirmDelete(id) {
			if (confirm("Are you sure you want to delete this question?") == true) {
				var xhttp = new XMLHttpRequest();
		        xhttp.onreadystatechange = function() {
		            if (xhttp.readyState == 4 && xhttp.status == 200) {
						location.href = "./home.php";
		            }
		        }
		        xhttp.open("POST", "./ajax/delete.php", true);
		        xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
		        xhttp.send("id=" + id);
			}
		}
	</script>

	<div class="question">
		<div class="question" id="voteupdown">
			<div>
				<a href=javascript:vote(<?php echo $question_id; ?>,'question','up')>
					<img src="img/up.png" width="20%" height="20%">
				</a>
			</div>
			<div id="questionvote">
				<?php echo $question['vote']; ?>
			</div>
			<div>
				<a href=javascript:vote(<?php echo $question_id; ?>,'question','down')>
					<img src="img/down.png" width="20%" height="20%">
				</a>
			</div>
		</div>
		<div class="question" id="content">
			<?php echo $question['content']; ?>
		</div>
		<div class="question" id="asked_by">
			asked by <?php echo $question['email']; ?>
			| <a href="create.php?question_id=<?php echo $question_id; ?>"><font color="#ffdb00">edit</font></a> | 
			<a href="javascript:confirmDelete(<?php echo $question_id; ?>)">
				<font color="ff1a00">delete</font>
			</a>
		</div>
	</div>

	<h3>
		<?php
			$answer_count_sql = "SELECT count(id) as c FROM answer WHERE question_id=$question_id";
			$answer_count = mysql_fetch_assoc(mysql_query($answer_count_sql));
			echo $answer_count['c'];
		?> Answer(s)
	</h3>
	<hr>
	<?php
		$answers = "SELECT * FROM answer WHERE question_id=$question_id";
		$result = mysql_query($answers);
	?>
	
	
	<?php while($row = mysql_fetch_assoc($result)) { ?>
		<div class="answer">
			<div class="answer" id="votes">
				<div>
					<a href=javascript:vote(<?php echo $row['id']; ?>,'answer','up')>
						<img src="img/up.png" width="20%" height="20%">
					</a>
				</div>
				<div id="answervote<?php echo $row['id']; ?>">
					<?php echo $row['vote']; ?>
				</div>
				<div>
					<a href=javascript:vote(<?php echo $row['id']; ?>,'answer','down')>
						<img src="img/down.png" width="20%" height="20%">
					</a>
				</div>
			</div>
			<div class="answer" id="content">
				<?php echo $row['content']; ?>
			</div>
			<div class="answer" id="answered_by">
				answered by <?php echo $row['email']; ?>
			</div>
			<hr>
		</div>
	<?php } ?>

	<script type="text/javascript">
	    function validateAnswerForm() {
	        var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	        if (document.forms["answerform"]["name"].value == null || document.forms["answerform"]["name"].value == "" ||
	            document.forms["answerform"]["email"].value == null || document.forms["answerform"]["email"].value == "" ||
	            document.forms["answerform"]["content"].value == null || document.forms["answerform"]["content"].value == "") {
		            alert("All required fields must be filled out");
		            return false;
	        }
	        else if(!re.test(document.forms["answerform"]["email"].value)) {
	            alert("Incorrect email address");
	            return false;
	        }
	    }
	</script>

	<br>
	<h3>Your Answer</h3>
	<form name="answerform" action="home.php" class="form" method="POST" onsubmit="return validateAnswerForm()">
		<input type="text" name="name" placeholder="Name" id="name">
		<br>
		<input type="text" name="email" placeholder="Email" id="email">
		<br>
		<textarea name="content" placeholder="Content" rows="5" id="content"></textarea>
		<br>
		<input type="submit" value="Post" id="submit">
		<input type="hidden" name="type" value="answer">
		<input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
	</form>
	<?php mysql_close($conn) ?>
</body>
</html>