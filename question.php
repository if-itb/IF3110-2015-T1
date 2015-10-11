<!DOCTYPE html>
<html>
<head>
<title>Stack Exchange</title>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<center><h1>Simple StackExchange</h1></center>
<?php
	include "function/database.php";
	$conn = connect_database();

	$sql = "SELECT * FROM `question` WHERE question_id=".$_GET["q_id"];
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$q_id = $row["question_id"];
?>
<div class="question">
<?php
    		echo "
    		<span id=\"vote\">".$row["vote"]."<br>votes</span>
    		<span id=\"answer\">0<br>answer</span>
    		<span id=\"question-content\">
    			<p id=\"question-title\"><a href='question.php?q_id=$q_id'>".$row["topic"]."</a></p>";
    			$content = $row["content"];
    			if(strlen($content)>330) $content=substr($content, 0, 327)."...";
    		echo "
    			<p id=\"question-content\">$content</p>
    		<br>asked by: ".$row["name"]." | <a href='edit_question.php?q_id=$q_id'>Edit</a> | <a href='submit.php?q_id=$q_id&idx=3'>Delete</a><br>";
?>
</div>
<?php
		}
	}
	$sql = "SELECT * FROM `answer` WHERE question_id=".$_GET["q_id"];
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$q_id = $row["question_id"];
    		echo "<hr size='5' NOSHADE>";
			echo "<div class='question'>";
    		echo "
    		<span id=\"vote\">".$row["vote"]."<br>votes</span>
    		<span id=\"answer\">0<br>answer</span>
    		<span id=\"question-content\">";
    			$content = $row["content"];
    		echo "
    			<p id=\"question-content\">$content</p>
    		<br>answered by: ".$row["name"]."<br>";
			echo "</div>";
		}
	}
	mysqli_close($conn);
?>

<form id="question-form" action="submit.php?q_id=<?php echo $q_id."&idx=4";?>" method="post">
	<center>
		<input type="text" name="name" placeholder="name"><br>
		<input type="text" name="email" placeholder="email"><br>
		<textarea name="content" placeholder="content"></textarea><br>
	</center>	
		<button type="submit" name="search">Submit</button>
</form>

</body>