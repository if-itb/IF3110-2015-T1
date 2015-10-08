<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/qstyle.css"/>
	<title>Questions</title>
</head>
<body>
	 <div id="big">Simple StackExchange</div>
	 <div class="medium" id="m1">What's your question?</div>
	<?php $conn = new mysqli("localhost","root","","stackoverflow");
	if($conn->connect_error)
		die("Connection failed : ".$conn->connect_error);
	$sql = "SELECT * FROM questions WHERE no=11";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	echo "<form name=\"makequestion\" method=\"post\" action=\"sendquestions.php\">";
		echo "<input type=\"text\" name=\"name\" placeholder=\"".$row["name"]."\" class=\"medium\">";
		echo "<input type=\"email\" name=\"email\" placeholder=\"".$row["email"]."\" class=\"medium\">";
		echo "<input type=\"text\" name=\"question\" placeholder=\"".$row["question"]."\" class=\"medium\">";
		echo "<textarea type=\"text\" name=\"content\" placeholder=\"".$row["content"]."\" class=\"medium\" id=\"content\"></textarea>"; 
		echo "<input type=\"submit\" value=\"Post\" id=\"button\">";
	$sql = "UPDATE TABLE questions ";
	$conn->close();
	?></form>
</body>
</html>