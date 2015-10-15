<!DOCTYPE html>
<html>
<head>
  	<title>Create</title>
  	<meta charset="UTF-8">

  	<link rel="stylesheet" type="text/css" href='style.css'/>

</head>
<body>

<?php include 'connect.php';?>


<div class="title">Simple StackExchange</div>
<br>



<?php
	if (isset($_GET['question_id'])){
		//for the question
		$question_id = mysqli_real_escape_string($conn, $_GET["question_id"]);
		$sql = "SELECT vote, topic, content, email FROM Question WHERE question_id = $question_id";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		$question_topic = 
			"<div class='subtitle'>" . $row['topic'] . "</div>"
			;
		$question_line = 
			"<div class='line'> <hr> </div>"
			;
		$question_vote = 
			"<div class='block-QA>" . "<div class='bQA-vote'>" . $row['vote'] . "<br>" . " Votes" . "</div>"
			;
		$question_content = 
			"<div class='bQA-content'>" . $row['content'] . "</div>"
			;
		$question_username = 
			"<div class='bQA-identity'>" . "asked by " . $row['email'] . " at " . "7/10/1996 08.00" 
			. " | " . "edit" . " | " . "delete" . "</div>" . "</div>"
			;
	
		$question_all = $question_topic . $question_line . $question_vote . $question_content . $question_username;
		
		echo $question_all;


		echo "<br><br><br><br>";
		//for the answer
		$sql = "SELECT answer_id, vote, content, email FROM Answer
		WHERE question_id = $question_id";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		    	$question_content_vote = "<div class='block-QA'>" . "<div class='bQA-vote'>" 
		    		. $row['vote'] . "<br>" . " Votes" . "</div>";
		    	//$question_content_answers = "<div class=\"column-two\">" 
		    	//	. $row['vote'] . "<br>" . " Answers" . "</div>";
		    	//$question_content_topic = "<div class='column-three'>" 
		    	//	. "<a id='ask' href=# onclick='goToQuestion(" . $row['question_id'] . ")' " 
		    	//	. "'>" . $row['topic'] ."</a>";
		    	$question_content_content = "<div class='bQA-content'>" . "<br>" . $row['content'] . "</div>";
		    	$question_content_email = "<div class='bQA-identity'>" 
		    		. "answered by " . $row['email'] . " at " . "7/10/1996 08.00" 
		    		. "</div>";
		    	$question_content_edit = "<a id='ask' href=# onclick='editconfirm(" . $row['answer_id'] . ")' " 
		    		. "'>edit</a>";
		    	$question_content_delete = "<a id='ask' href=# onclick='deleteconfirm(" . $row['answer_id'] . ")' " 
		    		. "'>delete</a>" . "</div>";
		    	$question_content_line = "<div class='line'> <hr> </div>";
		    	
		    	$question_content_all = $question_content_vote . $question_content_content . $question_content_email . $question_content_edit . $question_content_delete . $question_content_line;

		    	echo $question_content_all;
		    }
		} else {
		    echo "0 results";
		}

		//answer form
		$form = 
		"
		<br><br><br><br><br><br><br>
		<form name='askForm' action='anspost.php' method='post'>
			<input type='hidden' name='question_id' value=' " . $question_id ."'>
			<input type='text' name='name' placeholder='Name' size='100'><br>
			<input type='text' name='email' placeholder='Email' size='100'><br>
			<textarea name='content' rows='5' cols='40' placeholder='Content'></textarea><br>
			<input type='submit' value='Post'>
		</form>";
		echo $form;


	}
	else{
		echo "An error occured, the question is not available";
	}
?>

<?php
	/*$sql = "SELECT vote, content, email FROM Answer WHERE question_id = 35";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	$question_topic = "<div class='subtitle'>" . $row['topic'] . "</div>";
	$question_line = "<div class='line'> <hr> </div>";
	$question_vote = "<div class='column-one'>" . $row['vote'] . "<br>" . " Votes" . "</div>";
	$question_content = "<div class='column-two'>" . $row['content'] . "</div>";
	$question_username = "<div class='row-bottom'>" . "asked by " . $row['email'] . " at " . "7/10/1996 08.00" . " | " . "edit" . " | " . "delete" . "</div>";
	
	$question_all = $question_topic . $question_line . $question_vote . $question_content . $question_username;
	
	echo $question_all;*/
?>


<br>
<br>
<br>
<br>
<br>
<br>
<div class="line"> <hr> </div>
<br>




</body>
</html>
