<!DOCTYPE html>
<html>
<head>
  	<title>Question</title>
  	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href='style.css'/>
</head>
<body>

<div class="title">Simple StackExchange</div>

<form>
  <input type="text" name="question">
  <input type="submit" value="Search">
</form>

<p id = "helping"> Cannot find what you are looking for? <a id = "ask" href="ask.php" >Ask here</a></p>

<p id = "faq"> Recently Asked Questions <p>

<div class="line"> <hr> </div>



<?php include 'connect.php';?>

<?php
	$sql = "SELECT question_id, vote, topic, content, email FROM Question";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	    	echo "<div class=\"column-one\">" . $row["vote"] . "<br>" . " Votes" . "</div>";
	    	echo "<div class=\"column-two\">" . $row["vote"] . "<br>" . " Answers" . "</div>";
	    	echo "<div class=\"column-three\">" . $row["topic"] . "<br>" . $row["content"] . "</div>";
	    	echo "<div class=\"column-four\">" . "asked by " . $row["email"] . " at " . "7/10/1996 08.00" . " | " . "edit" . " | " . "delete" . "</div>";
	    	echo "<p><a id=\"ask\" href=\"delete_question.php?question_id=" . $row["question_id"] . "\">delete</a></p>";
	    	echo "<br>";
	    	echo "<br>";
	    	echo "<div class=\"line\"> <hr> </div>";

	    }
	} else {
	    echo "0 results";
	}
?>



</body>
</html>





