<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/qstyle.css">
	<title>Home</title>
</head>
<body>
	<div class="mediumbaru">
	<div id="big">Simple StackExchange</div>
	<div class="input">
		<input class="input1" type="text">
		<input class="input2" type="submit" value="Search" id="search">
	</div>
	<strong> <div id="m4">Cannot find what you're looking for? 
	<a href="../questions/questions.php"> Ask here</a></div> </strong>
	<div id="m1">Recently Asked Questions</div>
	<div>  <?php $conn = new mysqli("localhost","root","","stackoverflow");
	if($conn->connect_error)
		die("Connection failed : ". $conn->connect_error);
	$sql = "SELECT * FROM questions";
	$ans = mysqli_query($conn, $sql);
	while($row=$ans->fetch_assoc()) {
	echo "<div class=\"div1\">
			<div class=\"div2\">
			  <div class=\"div4\">
				<span>".$row['vote']."</span>
				<span>Vote</span>";	
			echo "</div>";
			echo "<div class=\"div5\">";
				echo "<span>".$row['vote']."</span>";
				echo "<span>Answer</span>";
			echo "</div>";
		echo "</div>";
		echo "<div class=\"div3\">";
			echo "<div class=\"div6\"> <a href=\"../answers/answers.php?id=".$row['no']."\">".$row['question']."</a></div>";
			echo "<div class=\"div7\">Asked by ".$row['name']." at ".$row['time']." | <a href=\"../questions/editquestions.php?id=".$row['no']."\">edit</a> | <a href=\"../questions/deletequestions.php?id=".$row['no']."\">delete</a></div>";
		echo "</div>";
	echo "</div>";
	} $conn->close();
	?> 
	</div>
	</div>
</body>
</html>