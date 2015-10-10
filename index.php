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

<center><form action="search.php" method="post">
	<input type="text" name="search">
	<button type="submit" name="search">Search</button>
</form>
Cannot find what you're looking for? Ask <a href="ask_question.php">here</a>.
</center>

<h2>Recently Asked Questions</h2>
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
	
	$sql = "SELECT name, topic, email, content, vote FROM `question` ORDER BY date_created DESC LIMIT 3";
	$result = mysqli_query($conn,$sql);

	$idx = 1;
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
    		echo "<hr size='5' NOSHADE>";
?>
<div class="question">
<?php
    		echo "
    		<span id=\"vote\">".$row["vote"]."<br>votes</span>
    		<span id=\"answer\">0<br>answer</span>
    		<span id=\"question-content\">
    			<p id=\"question-title\">".$row["topic"]."</p>
    			<p id=\"question-content\">".$row["content"]."</p>
    		<br>asked by: ".$row["name"]." | Edit | Delete<br>";
?>
</div>
<?php
	    	$idx++;
	    	if($idx==5) break;
    	}
	}

	mysqli_close($conn);
?>

</body>
</html>