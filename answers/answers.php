<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/qstyle.css">
	<title>Answers</title>
</head>
<body>
	<div id="big">Simple StackExchange</div>
	<?php $conn = new mysqli("localhost","root","","stackoverflow");
	if($conn->connect_error)
		die("Connection failed : " . $conn->connect_error);
	$sql = "SELECT * FROM questions WHERE no=11";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	echo "<div class=\"medium\" id=\"m1\">". $row["question"] ."</div>";
	echo "<div class=\"medtab\"><table>";
		echo"<tr>";
			echo"<td id=\"num\">";
				echo"<table>";
					echo"<tr><td>▲</td></tr>";
					echo"<tr><td>". $row["vote"] ."</td></tr>";
					echo"<tr><td>▼</td></tr>";
				echo"</table>";
			echo"</td>";
			echo"<td id=\"anscontent\">". $row["content"] ."</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td id=\"asker\">asked by ". $row["email"] ." at ". $row["time"] ." <a href=\"../questions/questions.php\">edit</a> | delete</td>";
		echo"</tr>";
	echo"</table></div>"; 
	$sum = "SELECT COUNT(*) AS SHIT FROM answers WHERE question_no=11";
	$ans = mysqli_query($conn, $sum);
	while ($row=$ans->fetch_assoc()) {
	echo"<div class=\"medium\" id=\"m1\">".$row['SHIT'] ." Answer</div>"; }
	$sql = "SELECT * FROM answers WHERE question_no=11";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)) {
	echo"<div class=\"medtab\"><table>";
		echo"<tr>";
			echo"<td id=\"num\">";
				echo"<table>";
					echo"<tr><td>▲</td></tr>";
					echo"<tr><td>". $row["vote"] ."</td></tr> ";
					echo"<tr><td>▼</td></tr>";
				echo"</table>";
			echo"</td>";
			echo"<td id=\"anscontent\">". $row["content"] ."</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td id=\"asker\">answered by ". $row["email"] ." at ". $row["time"] ."</td>";
		} $conn->close();
		?></tr>
	</table></div>
	<div class="medium" id="m2">Your Answer</div>
	<form name="makequestion" method="post" action="sendanswers.php">
		 <input type="text" name="name" placeholder="Name" class="medium">
		 <input type="email" name="email" placeholder="Email" class="medium">
		 <textarea type="text" name="content" placeholder="Content" class="medium" id="content"></textarea> 
		 <input type="submit" value="Post" id="button">
	 </form>
</body>
</html>