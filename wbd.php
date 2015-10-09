<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="wbd.css">
</head>
<body>
<h1>Simple Stack Exchange</h1>
<form name="SearchQuestion">
	<input id="SearchBox" type="text" placeholder="Search..." required">
	<input id="SubmitButton "type="button" value="Search"><br>
</form>
	<p id="p1">Cannot find what you are looking for?
	<a href="wbd2.php" style="color:yellow">Ask here</a></p>
<p id="recently">Recently Asked Questions</p>
<div id="questiontable">
	<?php
	$link = mysqli_connect("127.0.0.1","root","","wbd");
	if (!$link){
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	//echo "Success: A proper connection to MySQL was made! The WBD database is great" . PHP_EOL;
	//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$sql = "INSERT INTO question(Nama, Email, QuestionTopic, Content, Vote) VALUES ('$_POST[name]','$_POST[email]','$_POST[questiontopic]','$_POST[content]',0)";
		if(!mysqli_query($link,$sql)){
			echo "Input data failed";
		}
	}

	$sql = "SELECT * FROM QUESTION";
	$retval = mysqli_query($link,$sql);
	if(!$retval){
		throw new My_Db_Exception ('Database error: ' . mysql_error());
	}
	
	
	while ($row = $retval->fetch_assoc()){
		$sql4 = "SELECT COUNT(answer.IDAns) AS JumlahJawaban FROM answer WHERE answer.IDQ=" . $row['IDQ'];
		$retval4 = mysqli_query($link,$sql4);
		if(!$retval4){
			throw new My_Db_Exception ('Database error: ' . mysql_error());
		}
		echo "<div id='result'>";
		echo "<table>";
		echo "<hr>";
		echo "<tr>";
		echo "<td class = 'td1'> " .$row['Vote'] ."<br>Votes</td>";
		if ($row2 = $retval4->fetch_assoc()){
			$temp = $row2['JumlahJawaban'];
		}
		echo "<td class = 'td1'> " .$temp . "<br>Answers</td>";
		echo "<td id = 'td2'> <a href = 'answer.php?id=" . $row['IDQ'] . "'>" . $row['QuestionTopic'] . "</a></td>";
		echo "<td id = 'td3'> <p id='huruf2'>asked by <style='color:blue'>" . $row['Nama'] . " | edit | delete </p></td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
	}
	mysqli_close($link);
	?>
</div>
</body>
</html>