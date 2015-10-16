<!DOCTYPE html>
<html>
<head>
  	<meta charset="UTF-8">
  	<link rel="stylesheet" type="text/css" href='style.css'/>
  	<script type="text/javascript" src="script.js"></script>
  	<title>Simple StackExchange</title>
</head>
<body>
	<div class="link-normalizer"><a class='title' href="question.php">Simple StackExchange</a></div>
	<br>
	<br>
	<br>
	<br>
	<div class="subtitle">What's your question?</div>
	<hr class='line'>

	<?php include 'connect.php';?>

	<?php
	    if (isset($_GET['question_id'])){
		    $question_id = mysqli_real_escape_string($conn, $_GET["question_id"]);
		    $sql = "SELECT name, email, topic, content FROM Question WHERE question_id = $question_id";
		    $result = mysqli_query($conn, $sql);
		    $row = mysqli_fetch_assoc($result);
		    if (mysqli_num_rows($result) > 0) {
		        $name = $row["name"];
		        $email = $row["email"];
		        $topic = $row["topic"];
		        $content = $row["content"];
		    }
		   	else{
	        	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	    	}
	    }
	    else{
	    	$question_id = 0;
	        $name = "";
	        $email = "";
	        $topic = "";
	        $content = "";
	    }

	        echo 
	        "<form name=\"askForm\" action=\"askpost.php\" onsubmit=\"return validateQuestion()\" method=\"post\">
	        <input value=\"" . $question_id . "\" type=\"hidden\" name=\"question_id\">
	        <input value=\"" . $name . "\" type=\"text\" class='form-text' name=\"name\" placeholder=\"Name\"><br>
	        <input value=\"" . $email . "\" type=\"text\" class='form-text' name=\"email\" placeholder=\"Email\"><br>
	        <input value=\"" . $topic . "\" type=\"text\" class='form-text' name=\"topic\" placeholder=\"Question Topic\"><br>
	        <textarea name=\"content\" class='form-textarea' placeholder=\"Content\">" . $content ."</textarea><br>
	        <button class='button-post' type='submit'> Post </button>
	        </form>";
	?>
</body>
</html>


