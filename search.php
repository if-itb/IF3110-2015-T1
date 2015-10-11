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
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "stackexchange";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	    echo("Connection failed: " . mysqli_connect_error());
	}
	
	$sql = "SELECT * FROM `question` WHERE topic LIKE '% ".$_POST["search"]." %' OR content LIKE '% ".$_POST["search"]." %'";
	$result = mysqli_query($conn,$sql);

	$idx = 1;
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$q_id = $row["question_id"];
    		echo "<hr size='5' NOSHADE>";
?>
<div class="question">
<?php
    		echo "
    		<span id=\"vote\">".$row["vote"]."<br>votes</span>
    		<span id=\"answer\">0<br>answer</span>
    		<span id=\"question-content\">
    			<p id=\"question-title\">".$row["topic"]."</p>";
    			$content = $row["content"];
    			if(strlen($content)>330) $content=substr($content, 0, 327)."...";
    		echo "
    			<p id=\"question-content\">$content</p>
    		<br>asked by: ".$row["name"]." | <a href='edit_question.php?q_id=$q_id'>Edit</a> | <a href='delete_question.php?q_id=$q_id'>Delete</a><br>";
?>
</div>
<?php
	    	$idx++;
	    	if($idx==5) break;
    	}
	}
	else echo "0 Results";

	mysqli_close($conn);
?>

</body>
</html>