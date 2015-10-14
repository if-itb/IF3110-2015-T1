<!DOCTYPE html>
<html>
<head>
  	<title>Question</title>
  	<meta charset="UTF-8">

<script>
    function deleteconfirm(s){

    var del=confirm("Are you sure you want to delete this record?");
    if (del==true){
    	document.location =  "delete_question.php?question_id=" + s;
    }
    return del;
    }

    function editconfirm(s){

    var edit=confirm("Are you sure you want to edit this record?");
    if (edit==true){
    	document.location =  "ask.php?question_id=" + s;
    }
    return edit;
    }

    function goToQuestion(s){

    document.location =  "answer.php?question_id=" + s;
    return true;
    }


</script>

	<link rel="stylesheet" type="text/css" href='style.css'/>
</head>
<body>

<div class="title">Simple StackExchange</div>

<form>
  <input type="text" name="question">
  <input type="submit" value="Search">
</form>

<div class="smalltitle-center">Cannot find what you are looking for? <a id = "ask" href="ask.php" >Ask here</a></div>

<div class="smalltitle-left"> Recently Asked Questions </div>

<div class="line"> <hr> </div>



<?php include 'connect.php';?>

<?php
	$sql = "SELECT question_id, vote, topic, content, email FROM Question";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	    	$question_content_vote = "<div class='column-one'>" 
	    		. $row['vote'] . "<br>" . " Votes" . "</div>";
	    	$question_content_answers = "<div class=\"column-two\">" 
	    		. $row['vote'] . "<br>" . " Answers" . "</div>";
	    	$question_content_topic = "<div class='column-three'>" 
	    		. "<a id='ask' href=# onclick='goToQuestion(" . $row['question_id'] . ")' " 
	    		. "'>" . $row['topic'] ."</a>";
	    	$question_content_content = "<br>" . $row['content'] . "</div>";
	    	$question_content_email = "<div class='column-four'>" 
	    		. "asked by " . $row['email'] . " at " . "7/10/1996 08.00" 
	    		. " | " . "edit" . " | " . "delete" . "</div>";
	    	$question_content_edit = "<a id='ask' href=# onclick='editconfirm(" . $row['question_id'] . ")' " 
	    		. "'>edit</a>";
	    	$question_content_delete = "<a id='ask' href=# onclick='deleteconfirm(" . $row['question_id'] . ")' " 
	    		. "'>delete</a>";
	    	$question_content_line = "<div class='line'> <hr> </div>";
	    	
	    	$question_content_all = $question_content_vote . $question_content_answers . $question_content_topic . $question_content_content . $question_content_email . $question_content_edit . $question_content_delete . $question_content_line;

	    	echo $question_content_all;
	    }
	} else {
	    echo "0 results";
	}
?>



</body>
</html>





