<!DOCTYPE html>
<html>
<head>
	<title>
		Ask a Question
	</title>
	<link rel='stylesheet' type="text/css" href="css/sst.css">
</head>

<body>
	<?php
		$conn = mysql_connect('localhost', 'root', '08161955342');
		mysql_select_db('simplestackexchange', $conn);

		if (isset($_GET['question_id'])) {
			$question_id = $_GET['question_id'];
			$type = 'update';
		}
		else {
			$question_id = '';
			$type = 'ask';
		}

		$sql = "SELECT * FROM question where id=$question_id";
		$data = mysql_fetch_assoc(mysql_query($sql));
		$data['name'] = !isset($data['name']) ? '' : $data['name'];
		$data['email'] = !isset($data['email']) ? '' : $data['email'];
		$data['topic'] = !isset($data['topic']) ? '' : $data['topic'];
		$data['content'] = !isset($data['content']) ? '' : $data['content'];
	?>
	<h1 align="center">
		Simple StackExchange
	</h1>
	<br>
	<br>
	<h3 align="center">
		What's your question?
	</h3>
	<hr>
	<br>

	<script type="text/javascript">
	    function validateAnswerForm() {
	        var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	        if (document.forms["answerform"]["name"].value == null || document.forms["answerform"]["name"].value == "" ||
	            document.forms["answerform"]["email"].value == null || document.forms["answerform"]["email"].value == "" ||
	            document.forms["answerform"]["topic"].value == null || document.forms["answerform"]["topic"].value == "" ||
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

	<form name="answerform" action="home.php" class="form" method="POST" onsubmit="return validateAnswerForm()">
		<input type="text" name="name" value="<?php echo $data['name']; ?>" placeholder="Name" id="name">
		<br>
		<input type="text" name="email" value="<?php echo $data['email']; ?>" placeholder="Email" id="email">
		<br>
		<input type="text" name="topic" value="<?php echo $data['topic']; ?>" placeholder="Question Topic" id="topic">
		<br>
		<textarea name="content" placeholder="Content" rows="5" id="content"><?php echo $data['content']; ?></textarea>
		<br>
		<input type="submit" value="Post" id="submit">
		<input type="hidden" name="type" value="<?php echo $type; ?>">
		<input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
	</form>
	<?php mysql_close($conn); ?>
</body>
</html>