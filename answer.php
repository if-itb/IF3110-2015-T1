<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="wbd.css">
</head>
<body>
<h1>Simple Stack Exchange</h1><br>
<?php
	$id = $_GET["id"];
	$link = mysqli_connect("127.0.0.1","root","","wbd");
	if (!$link){
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	/*Retrieve live answer*/
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$sql = "INSERT INTO answer(IDQ, Nama, Email, Answer, Vote) VALUES ('$id', '$_POST[nama]','$_POST[alamat]','$_POST[jawaban]',0)";
		if(!mysqli_query($link,$sql)){
			echo "Input data failed";
		}
	}
	
	$sql = "SELECT * FROM QUESTION WHERE IDQ =". $id;
	$retval = mysqli_query($link,$sql);
	if(!$retval){
		throw new My_Db_Exception ('Database error: ' . mysql_error());
	}
	if ($row = $retval->fetch_assoc()){
		echo "<div id = 'container'>";
		echo "<p id='p2'>Topic : " .$row['QuestionTopic'] . "</p>";
		echo "</div>";
		echo "<div id='isipertanyaan'>";
	echo "<table>";
		echo "<tr>";
			echo "<td id='td5'><p id='jumlahvote'>" . $row['Vote'] ."</p></td>";
			echo "<td id='td6'><p id='pertanyaan'>" . $row['Content'] . "</p><td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td></td>";
			echo "<td id='td7'>asked by " .$row['Nama'] . " | edit | delete </td>";
		echo "</tr>";
	echo "</table>";
	echo "</div>";
	}
	
	$sql2 = "SELECT answer.Nama, answer.Email, answer.Answer, answer.Vote FROM answer WHERE answer.IDQ =" .$id;
	$sql3 = "SELECT COUNT(answer.IDAns) AS JumlahJawaban FROM answer WHERE answer.IDQ =" .$id;
	$retval2 = mysqli_query($link,$sql2);
	$retval3 = mysqli_query($link,$sql3);
	if(!$retval2){
		throw new My_Db_Exception('Database error: ' . mysql_error());
	}
	if(!$retval3){
		throw new My_Db_Exception('Database error: ' . mysql_error());
	}
	if($row = $retval3->fetch_assoc()){
		echo "<div id = 'container'>";
		echo "<p id='p2'>" .$row['JumlahJawaban'] . " Answers</p>";
		echo "</div>";
	}
	while ($row = $retval2->fetch_assoc()){
		echo "<div id='isipertanyaan'>";
		echo "<table>";
		echo "<tr>";
		echo "<td id='td5'><p id='jumlahvote'>" . $row['Vote'] ."</p></td>";
		echo "<td id='td6'><p id='pertanyaan'>" . $row['Answer'] . "</p></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td></td>";
		echo "<td id='td7'>answered by " . $row['Nama'] . " | edit | delete </td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
		echo "<div id='container'>";
			echo "<p id='p2'></p>";
		echo "</div>";
	}

	echo "<div id='container'>";
		echo "<p id='p10'>Your Answer</p>";
	echo"</div>";
echo "<br>";
echo "<form name='ReplyQ' action = 'answer.php?id=" . $id . " method='post'>";
	echo "<input id='name' type='text' name='nama' class='widthask' placeholder='Name' required'><br>";
	echo "<input id='email' type='text' name='alamat' class='widthask' placeholder='Email' required'><br>";
	echo "<textarea name='content' rows='10' cols='66' name='jawaban' placeholder='Content'></textarea><br>";
	echo "<input id='PostButton'type='submit' value='Post'>";
echo "</form>";
?>
</body>
</html>