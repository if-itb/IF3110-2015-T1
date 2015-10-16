<!DOCTYPE html>
<html>

<head>
  	<meta charset="UTF-8">
  	<link rel="stylesheet" type="text/css" href='style.css'/>
  	<script type="text/javascript" src="script.js"></script>
  	<title>Simple StackExchange</title>
</head>

<body>

<?php include 'connect.php';?>


<div class="title">Simple StackExchange</div>
<br>
<br>
<br>
<br>



<?php
		$border = 
			"<hr class='line'>"
			;
	if (isset($_GET['question_id'])){
		//for the question
		$question_id = mysqli_real_escape_string($conn, $_GET["question_id"]);
		$sql = "SELECT question_id, vote, topic, content, email, time FROM Question WHERE question_id = $question_id";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		echo 
			"<div class='subtitle'>"
				.$row['topic']
			."</div>"
			."<hr class='line'>"
			."<div class='block-QA'>"
				."<div class='bQA-vote'>"
					."<div class='vote-up' onclick='addQuestionVote(".$row['question_id'].")''>"
		    		."</div>"
		    		."<br>"
					."<a class='vote-value' id='question_vote".$row['question_id']."'>"
					.$row['vote']
					."</a>"
					."<br><br>"
					."<div class='vote-down' onclick='subtractQuestionVote(".$row['question_id'].")''>"
					."</div>"
				."</div>"
				."<div class='bQA-content'>"
					.$row['content']
					."<br><br>"
				."</div>"
				."<div class='bQA-identity'>"
					."asked by "
					.$row['email']
					." at "
					.$row['time'] 
					." | "
					."<a id='color-orange' href=# onclick='editconfirm(".$row['question_id'].")'" ."'>"
					."edit"
	    			."</a>"
	    			." | "
	    			."<a id='color-red' href=# onclick='deleteconfirm(".$row['question_id'].")'"."'>"
	    			."delete"
	    			."</a>"
	    		."</div>"
	    	."</div>"
		;
			
		echo "<br><br><br><br><br>";

		//for the answer count
		$sql = "SELECT count(*) AS answer_count FROM Answer
		WHERE question_id = $question_id";
		$result = mysqli_query($conn, $sql);

		$row = mysqli_fetch_assoc($result);
		if ($row['answer_count'] > 1){
			$answer = " Answers";
		}
		else{
			$answer = " Answer";
		}
		$answer_count =
			"<div class='subtitle'>" . $row['answer_count'] . $answer . "</div>"
			;
		echo $answer_count . $border;
		//for the answer
		$sql = "SELECT answer_id, vote, content, email, time FROM Answer
		WHERE question_id = $question_id";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		    	echo 
		    		"<div class='block-QA'>"
		    			."<div class='bQA-vote'>"
		    				."<div class='vote-up' onclick='addAnswerVote(".$row['answer_id'] . ")''>"
		    				."</div>"
							."<br>"
		    				."<a class='vote-value' id='answer_vote" . $row['answer_id'] . "'>" .$row['vote']
		    				."</a>"
		    				."<br><br>"
							."<div class='vote-down' onclick='subtractAnswerVote(" . $row['answer_id'] . ")''>"
							."</div>"
						."</div>"
						."<div class='bQA-content'>"
							.$row['content']
							."<br><br>"
						."</div>"
		    			."<div class='bQA-identity'>" 
		    				."answered by "
		    				.$row['email']
		    				." at "
		    				.$row['time']
		    			."</div>"
		    		."</div>"
		    		."<hr class='line'>"
		    	;
		    }
		}

		echo "<br><br>";

		//answer form
		$YA = 
			"<div class='subtitle'>" . "<a id='color-grey'>" . "Your Answer" . "</a>" . "</div>"
			;
		$form = 
		"<form name='answerForm' action='anspost.php' onsubmit='return validateAnswer()' method='post'>
			<input type='hidden' name='question_id' value=' " . $question_id ."'>
			<input type='text' class='form-text' name='name' placeholder='Name'><br>
			<input type='text' class='form-text' name='email' placeholder='Email'><br>
			<textarea class='form-textarea' name='content' placeholder='Content'></textarea><br>
			<button class='button-post' type='submit'> Post </button>
		</form>";
		echo $YA . $form;


	}
	else{
		echo "An error occured, the question is not available";
	}
?>

</body>
</html>
