<!DOCTYPE html>
<html>

<head>
  	<meta charset="UTF-8">
  	<link rel="stylesheet" type="text/css" href='style.css'/>
  	<script type="text/javascript" src="script.js"></script>
  	<title>Simple StackExchange</title>
</head>

<body>

<div class="title">Simple StackExchange</div>

<br><br><br><br>

<form>
  <input class='form-search' type="text" name="search" size='120%'>
  <button class='button-search' type='submit'> Search </button>
</form>



<div class="smalltitle-center">Cannot find what you are looking for? <a id = "color-orange" href="ask.php" >Ask here</a></div>
<br>

<div class="smalltitle-left"> Recently Asked Questions </div>

<hr class='line'>



<?php include 'connect.php';?>

<?php
	$sql = "SELECT question_id, vote, topic, content, name FROM Question";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	    	$question_content_vote = 
	    		"<div class='block-question'>" . "<div class='bquestion-vote'>" 
	    		. $row['vote'] . "<br>" . " Votes" . "</div>"
	    		;
	    	$question_content_answers = 
	    		"<div class='bquestion-answer'>" 
	    		. $row['vote'] . "<br>" . " Answers" . "</div>"
	    		;
	    	$question_content_topic = 
	    		"<div class='bquestion-content'>" 
	    		. "<a id='color-black' href=# onclick='goToQuestion(" . $row['question_id'] . ")' " 
	    		. "'>" . $row['topic'] ."</a>"
	    		;
	    	$question_content_content = 
	    		"<br>" . $row['content'] . "</div>"
	    		;
	    	$question_content_email = 
	    		"<div class='bquestion-identity'>" 
	    		. "asked by " . "<a id='color-blue'>" . $row['name'] . "</a>"
	    		;
	    	$question_content_edit = 
	    		" | " . "<a id='color-orange' href=# onclick='editconfirm(" . $row['question_id'] . ")' " 
	    		. "'>edit</a>"
	    		;
	    	$question_content_delete = 
	    		" | " . "<a id='color-red' href=# onclick='deleteconfirm(" . $row['question_id'] . ")' " 
	    		. "'>delete</a>" . "</div>" . "</div>"
	    		;
	    	$question_content_line = 
	    		"<hr class='line'>"
	    		;
	    	$question_content_all = 
	    		$question_content_vote . $question_content_answers . $question_content_topic . $question_content_content . $question_content_email . $question_content_edit . $question_content_delete . $question_content_line
	    		;

	    	echo $question_content_all;
	    }
	} else {
	    echo "0 results";
	}
?>



</body>
</html>





